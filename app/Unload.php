<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unload extends Model
{
    protected $fillable = ['join', 'prince', 'taxes', 'tva', 'accounting_id'];

    public function accounting()
    {
        return $this->belongsTo(Accounting::class);
    }
}
