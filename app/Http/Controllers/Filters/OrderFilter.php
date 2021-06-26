<?php


namespace App\Http\Controllers\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{
    public const ID = 'id';
    public const STATUS = 'status';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', $value);
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }
}
