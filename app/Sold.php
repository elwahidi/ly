<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $fillable = ['slug', 'qt', 'product_id', 'accounting_id', 'sale_order_id'];

    public function orders()
    {
        return $this->belongsTo(Sale_order::class);
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
