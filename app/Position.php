<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * @package App
 */
class Position extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['position', 'info_id', 'member_id', 'company_id'];

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
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function info()
    {
        return $this->belongsTo(Info::class);
    }
}
