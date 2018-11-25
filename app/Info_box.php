<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Info_box
 * @package App
 */
class Info_box extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['brand', 'name', 'slug', 'licence', 'turnover', 'taxes', 'fax', 'speaker', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tels()
    {
        return $this->hasMany(Tel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne(Provider::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
