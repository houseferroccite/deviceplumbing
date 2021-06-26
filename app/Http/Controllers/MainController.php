<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\News;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        $news = News::get();
        return view('index',compact('products','news'));
    }
    public function indexSearch(ProductFilterRequest $request)
    {
        $productQuery = Product::query();
        if($request->filled('price_from')){
            $productQuery->where('price','>=',$request->price_from);
        }
        if($request->filled('price_to')){
            $productQuery->where('price','<=',$request->price_to);
        }
        foreach (['hit','new','recommend'] as $field){
            if($request->has($field)){
                $productQuery->where($field,1);
            }
        }
        $products = $productQuery->paginate(6)->withPath("?".$request->getQueryString());
        return view('products',compact('products'));
    }
}
