<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public  function index(){
       $products = Product::orderBy('created_at', 'desc')->get();
       $cartProducts = Cart::count();
       return view('pages.shop', compact('products', 'cartProducts'));
   }

   public  function shopSingle($id)
   {
       $cartProducts = Cart::count();
       $product = Product::find($id);
       return view('pages.shop-single', compact('cartProducts', 'product'));
   }
}
