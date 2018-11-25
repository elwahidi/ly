<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_dv extends Model
{
    protected $fillable = ['slug', 'sale_id', 'client_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orders()
    {
        return $this->hasMany(Sale_order::class);
    }
}
