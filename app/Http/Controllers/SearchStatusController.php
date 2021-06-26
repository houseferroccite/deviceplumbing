<?php


namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;

class SearchStatusController
{
    public function searchStatus(Request $request)
    {
        $statusID = $request->statusID;
        $order = Order::where('status',$statusID)->get();
        return view('auth.order.home', compact('order'));
    }
}
