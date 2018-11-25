<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buy_order
 * @package App
 */
class Buy_order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['pu', 'ht', 'tva', 'ttc', 'bu_dv_id', 'buy_bc_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dvs()
    {
        return $this->belongsTo(Buy_dv::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchased()
    {
        return $this->hasOne(Purchased::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bc()
    {
        return $this->belongsTo(Buy_bc::class);
    }
}
