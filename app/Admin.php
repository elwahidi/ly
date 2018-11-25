<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Cette table consiste a indiquez les administrateurs.
 *
 * Class Admin
 * @package App
 */
class Admin extends Model
{
    /**
     * <p>
     *  Type :      pour identifier l'admin <br>
     *  user_id :   join user
     * </p>
     * @var array
     */
    protected $fillable = ['type', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
