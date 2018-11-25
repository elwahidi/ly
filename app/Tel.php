<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tel
 * @package App
 */
class Tel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tel', 'default', 'info_id', 'info_box_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function info()
    {
        return $this->belongsTo(Info::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info_boxe()
    {
        return $this->hasOne(Info_box::class);
    }
}
