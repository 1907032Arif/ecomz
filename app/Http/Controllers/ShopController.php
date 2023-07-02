<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
   public  function index(){
       $products = Product::orderBy('created_at', 'desc')->get();
       $cartProducts = 0;
       if (Auth::check())
       {
           $user = Auth::user();
           $cartProducts = Cart::where('user_id', $user->id)->count();
       }
       return view('pages.shop', compact('products', 'cartProducts'));
   }

   public  function shopSingle($id)
   {
       $cartProducts = Cart::count();
       $product = Product::find($id);
       return view('pages.shop-single', compact('cartProducts', 'product'));
   }
}
