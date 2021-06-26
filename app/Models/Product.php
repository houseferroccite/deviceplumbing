<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use Filterable;

    protected $fillable = ['code', 'barcode', 'name', 'description', 'availability', 'specification', 'address', 'CountProduct',
        'supplier_id',
        'category_id',
        'price', 'image', 'new', 'hit', 'recommend', 'comment_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplies()
    {
        return $this->belongsTo(Supplies::class, 'supplier_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isNotAvailable()
    {
        return $this->trashed() || $this->CountProduct == 0;
    }

    public function getPriceCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    public function scopeByCode($query, $id)
    {
        return $query->where('id', $id);
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
