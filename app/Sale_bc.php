<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_bc extends Model
{
    protected $fillable = ['qt', 'sale_id', 'purchased_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function purchased()
    {
        return $this->belongsTo(Purchased::class);
    }
}
