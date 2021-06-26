<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\OrderFilter;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderSearchController extends Controller
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function searchID(Request $request)
    {
        $data = $request->all();
        $filter = app()->make(OrderFilter::class,['queryParams' => array_filter($data)]);
        $orders = Order::filter($filter)->paginate(10)->withPath("?". $request->getQueryString());
        return view('auth.order.home', compact('orders'));
    }
    public function searchStatus(Request $request)
    {
        $status = $request->all();
        $filterStatus = app()->make(OrderFilter::class,['queryParams' => array_filter($status)]);
        $orders = Order::filter($filterStatus)->paginate(10)->withPath("?". $request->getQueryString());
        return view('auth.order.home', compact('orders'));
    }
}
