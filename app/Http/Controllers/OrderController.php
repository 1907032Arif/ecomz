<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function checkout(){

        return view('sslcommerz.exampleEasycheckout');
    }

    public function placeOrder(Request $request){
        $phone = $request->input('phone');
        $payment_method = $request->input('payment');
        $ship_addres = $request->input('ship_address');
        $bill_addres = $request->input('bill_address');
        $total_amount = $request->input('total_amount');

        if (Auth::check())
        {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_date = date("F j, Y, g:i a");
            $order->status = "";
            $order->payment_method = $payment_method;
            $order->shiping_address = $ship_addres;
            $order->billing_address = $bill_addres;
            $order->total_amount = $total_amount;
            $order->phone = $phone;
        }

    }
}
