<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user()->getAuthIdentifier();
        $orders = Auth::user()->orders()->orderBy('status', 'asc')->paginate(10);
        $orderTrashed = Order::onlyTrashed()->where('user_id', $user)->paginate(10);
        return view('auth.order.home', compact('orders', 'user', 'orderTrashed'));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        $products = $order->products()->withTrashed()->get();
        return view('auth.order.show', compact('order', 'products'));
    }

    public function destroy(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        if ($order->delete()) {
            $order->delete();
            session()->flash('success', 'Заказ успешно перемещен в раздел "История заказов" !');
            return redirect()->route('person.orders.index');
        } else {
            session()->flash('warning', 'Ошибка! Заказ не был перемещен в раздел "История заказа" !');
            return back();
        }
    }

    public function OrderTrashed($user)
    {
        $orderS = Order::onlyTrashed()->where('user_id', $user)->get();
        return view('auth.order.orders', compact('orderS'));
    }

    /**
     * @param Order $order
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        if (Order::where('id', $id)->forceDelete()) {
            session()->flash('success', 'Заказ успешно удален!');
            return redirect()->route('person.orders.index');
        } else {
            session()->flash('warning', 'Ошибка! Заказ не удален!');
            return back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        if (Order::where('id', $id)->restore()) {
            session()->flash('success', 'Заказ успешно восстановлен!');
            return redirect()->route('person.orders.index');
        } else {
            session()->flash('warning', 'Ошибка! Заказ не восстановлен!');
            return back();
        }
    }

}
