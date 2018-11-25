<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App
 */
class Status extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function premiums()
    {
        return $this->hasMany(Status::class);
    }
}
