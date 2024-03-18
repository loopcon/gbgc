<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function order()
    {
        $order=Order::with('membershipplan')->get();
        return view('frontend.order',compact('order'));
    }
}
