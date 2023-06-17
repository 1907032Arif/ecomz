<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function addCart(Request  $request){
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()){

            if (! Cart::where('id', $product_id)->where('user_id',Auth::id())->exists()){
                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->product_id = $product_id;
                $cart->quantity = $quantity;
                $cart->save();
                return response()->json(['status' => 'Product added to cart.']);
            }else {
                return response()->json(['status' => 'Product already added to cart.']);
            }

        }else {
            return response()->json(['status' => 'Login first please.']);
        }

    }

    public function viewCart(){
        $carts = Cart::where('user_id', Auth::id())->get();
        $cartProducts = Cart::count();
        return view('pages.cart', compact('carts', 'cartProducts'));
    }

    public function deleteCart(Request  $request){

        $id = $request->input('product_id');
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::id())->exists();
        if ($cart){
            $cartItem = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => 'Cart item deleted.']);
        }
    }

    public function updateCart()
    {

    }

    public function clearCart()
    {


       if (Auth::check()){
           $cart = Cart::where('user_id', Auth::id())->exists();
           if ($cart){
               $deletedCount = Cart::where('user_id', Auth::id())->delete();

               if ($deletedCount > 0) {
                   return response()->json(['status' => 'Cart cleared.', 'count' => $deletedCount]);
               } else {
                   return response()->json(['status' => 'No items found in the cart.']);
               }
           }
       }else {
           return response()->json(['status' => 'Login first']);
       }
    }
}
