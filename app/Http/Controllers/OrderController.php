<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        // $username = User::find($order->user_id)->name;

      
      
        return view('admin.order', compact('order'));
    }

}
