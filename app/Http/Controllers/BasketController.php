<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Payments;
use App\Models\Product;
use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        if(Auth::check()){
            return view('basket', compact('order'));
        }else{
            session()->flash('warning', 'Для оформления заказа Вам нужно авторизироваться');
        }
        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        $payments = Payments::get();
        if (!$basket->countAvailable()) {
            session()->flash('warning', 'Товар не доступен для заказа в полном объеме');
            return redirect()->route('basket');
        }
        return view('order', compact('order','payments'));
    }

    public function basketConfirm(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        $name = Auth::check() ? Auth::user()->name : $request->name;
        if ((new Basket())->saveOrder($name, $request->phone, $email,$request->payment)) {
            session()->flash('success', 'Ваш заказ принят, ожидайте сообщение на почту!');
        } else {
            session()->flash('warning', 'Ошибка!');
        }
        Order::eraseOrderSum();
        return redirect()->route('index');
    }

    public function basketAdd(Product $product)
    {
        if (Auth::check()){
            $result = (new Basket(true))->addProduct($product);
            if ($result) {
                session()->flash('success', 'Добавлен товар:' . ' ' . $product->name);
            } else {
                session()->flash('warning', 'Товар:' . '   ' . $product->name . ' ' . ' ' . 'в большем кол-ве не доступен для заказа');
            }
        }else{
            session()->flash('warning', 'Для оформления заказа Вам нужно авторизироваться');
        }
        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);
        session()->flash('warning', 'Удален товар:' . ' ' . $product->name);
        return redirect()->route('basket');
    }
}
