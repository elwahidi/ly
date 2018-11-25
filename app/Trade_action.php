<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trade_action
 * @package App
 */
class Trade_action extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bc', 'bc_member_id', 'bc_time', 'dv', 'dv_member_id', 'dv_time', 'done', 'done_member_id', 'done_time', 'delivery', 'delivery_member_id', 'delivery_time', 'store', 'store_member_id', 'store_time', 'bl', 'bl_member_id', 'bl_time', 'fc', 'fc_member_id', 'fc_time', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buy()
    {
        return $this->hasOne(Buy::class);
    }

    public function bc_member()
    {
        return $this->belongsTo(Member::class, 'bc_member_id');
    }

    public function dv_member()
    {
        return $this->belongsTo(Member::class,'dv_member_id');
    }

    public function done_member()
    {
        return $this->belongsTo(Member::class,'done_member_id');
    }

    public function delivery_member()
    {
        return $this->belongsTo(Member::class,'delivery_member_id');
    }

    public function store_member()
    {
        return $this->belongsTo(Member::class,'store_member_id');
    }

    public function bl_member()
    {
        return $this->belongsTo(Member::class,'bl_member_id');
    }

    public function fc_member()
    {
        return $this->belongsTo(Member::class,'fc_member_id');
    }

    public function sale()
    {
        $this->hasOne(Sale::class);
    }
}
