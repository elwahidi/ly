<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['slug', 'ht', 'tva', 'ttc', 'tva_payed', 'profit', 'taxes', 'profit_after_taxes', 'company_id', 'trade_action_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trade_action()
    {
        return $this->belongsTo(Trade_action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bcs()
    {
        return $this->hasMany(Sale_bc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dv()
    {
        return $this->hasOne(Sale_dv::class);
    }
}
