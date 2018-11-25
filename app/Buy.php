<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buy
 * @package App
 */
class Buy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'ht', 'tva', 'ttc', 'company_id', 'trade_action_id'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
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
        return $this->hasMany(Buy_bc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dvs()
    {
        return $this->hasMany(Buy_dv::class);
    }

    public function finish()
    {
        return $this->belongsTo(Trade_action::class)->where('status','=','finish');
    }
}
