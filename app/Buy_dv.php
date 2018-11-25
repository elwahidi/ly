<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buy_dv
 * @package App
 */
class Buy_dv extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'ht', 'tva', 'ttc', 'selected', 'buy_id', 'provider_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buy()
    {
        return $this->belongsTo(Buy::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function orders()
    {
        return $this->hasMany(Buy_order::class);
    }
}
