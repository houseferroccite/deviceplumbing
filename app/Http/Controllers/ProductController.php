<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function product(Product $product = null)
    {
        $comments = $product->comments()->get();
        return view('product', compact('product', 'comments'));
    }

    public function products()
    {
        $products = Product::paginate(6);
        return view('products', compact('products'));
    }
}
