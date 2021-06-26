<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController
{
    public function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('name', 'LIKE', "%{$s}%")->get();
        return view('products', compact('products'));
    }
}
