<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;

class PDFList extends Controller
{
    public function downloadPDF(Order $order)
    {
        $products = $order->products()->withTrashed()->get();
        $pdf = PDF::loadView('pdf.orderlist', compact('order', 'products'));
        return $pdf->download('orderlist.pdf');
    }

    public function productPDF()
    {
        $products = Product::get();
        $pdf = PDF::loadView('pdf.productsList', compact('products'));
        return $pdf->download('productsList.pdf');
    }
}
