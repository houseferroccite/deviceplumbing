<?php

namespace App\Models;

use App\Classes\Basket;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use Filterable;

    protected $fillable = ['user_id','status'];
    /**
     * @var mixed
     */

    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function getFullSum()
    {
        return session('full_order_sum', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function calculateFullSum(): int
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceCount();
        }
        return $sum;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function payments()
    {
        return $this->belongsTo(Payments::class, 'payment_id');
    }
    public function scopeByCode($query, $id)
    {
        return $query->where('user_id', $id);
    }
    public function saveOrder($name, $phone,$payments)
    {
        if ($this->status == null) {
            $this->name = $name;
            $this->phone = $phone;
            $this->payment_id = $payments;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
    public static function pregName($value)
    {
       return preg_replace('~^(\S++)\s++(\S)\S++\s++(\S)\S++$~u', '$1 $2.$3.', $value);
    }
}
