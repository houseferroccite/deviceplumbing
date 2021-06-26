<?php


namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminHomeController
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();
        $news = News::all();
        $users = User::all();
        return view('auth.layouts.indexAdm',compact('categories', 'products', 'orders', 'news', 'users'));
    }
}
