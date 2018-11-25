<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchased extends Model
{
    protected $fillable = ['slug', 'qt', 'store_qt', 'product_id', 'accounting_id', 'buy_order_id'];

    public function buy_order()
    {
        return $this->belongsTo(Buy_order::class);
    }

    public function sale_bc()
    {
        return $this->hasOne(Sale_bc::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function accounting()
    {
        return $this->belongsTo(Accounting::class);
    }
}
