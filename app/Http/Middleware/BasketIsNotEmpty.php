<?php

namespace App\Http\Middleware;

use App\Classes\Basket;
use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $orderId = session('orderId');
            if (!is_null($orderId) && Order::getFullSum() > 0) {
                return $next($request);
            }session()->flash('warning','Ваша корзина пуста!');
        }else{
            session()->flash('warning', 'Для оформления заказа Вам нужно авторизироваться');
        }
        return redirect()->route('index');
    }
}
