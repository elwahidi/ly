<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Premium
 * @package App
 */
class Premium extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sold', 'range', 'limit', 'category_id', 'status_id'];

    /**
     * @var string
     */
    protected $table = 'premiums';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(Member::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
