<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Company
 * @package App
 */
class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'info_box', 'premium_id'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function premium()
    {
        return $this->belongsTo(Premium::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function info_box()
    {
        return $this->belongsTo(Info_box::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * @return HasMany
     */
    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    /**
     * @return HasMany
     */
    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    /**
     * @return HasMany
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

    public function accounting()
    {
        return $this->hasOne(Accounting::class);
    }

    public function activate()
    {
        $premium = $this->premium;
        $date = (int)$premium->range;
        $premium->update(['range' => 0, 'limit' => gmdate("Y-m-d", strtotime("+$date days")), 'status_id' => Status::where('status', 'active')->first()->id]);
    }

    public function calendars()
    {
        return $this->hasOne('App\Calendar','company_id');
    }
}
