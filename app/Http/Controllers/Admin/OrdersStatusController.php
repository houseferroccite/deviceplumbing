<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersStatusController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Order $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = Order::where('id', $id);
        if ($orders->update(['status' => $request->status])) {
            session()->flash('success', 'Статус успешно обновлен!');
        } else {
            session()->flash('warning', 'Ошибка! Статус не обновлен!');
        }
        return redirect()->route('home');
    }
}
