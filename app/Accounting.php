<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Accounting
 * @package App
 */
class Accounting extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tva', 'taxes', 'profit', 'company_id', 'taxes_after_unload', 'tva_after_unload'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseds()
    {
        return $this->hasMany(Purchased::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solds()
    {
        return $this->hasMany(Sold::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unloads()
    {
        return $this->hasMany(Unload::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
