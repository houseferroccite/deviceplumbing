<?php


namespace App\Classes;


use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Basket
{
    protected $order;

    /**
     * Basket constructor.
     * @param bool $createOrder
     */
    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');

        if (is_null($orderId) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }
            $this->order = Order::create($data);
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::query()->findOrFail($orderId);
        }
    }
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone,$email,$payments)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        Mail::to($email)->send(new OrderCreated($name,$this->getOrder()));
        return $this->order->saveOrder($name, $phone,$payments);
    }

    public function countAvailable($updateCount = false)
    {
        foreach($this->order->products as $orderProduct)
        {
           if($orderProduct->CountProduct < $this->getPivotRow($orderProduct)->count){
                return false;
           }
           if ($updateCount){
               $orderProduct->CountProduct -= $this->getPivotRow($orderProduct)->count;
           }
        }
        if ($updateCount){
            $this->order->products->map->save();
        }
        return true;
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        Order::changeFullSum(-$product->price);
    }

    protected function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->CountProduct) {
                return false;
            }
            $pivotRow->update();
        } else {
            if ($product->CountProduct == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
        }
        Order::changeFullSum($product->price);

        return true;
    }

}
