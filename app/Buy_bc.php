<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy_bc extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['qt', 'buy_id', 'product_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buy()
    {
        return $this->belongsTo(Buy::class);
    }

    public function order()
    {
        return $this->hasOne(Buy_order::class);
    }
}
