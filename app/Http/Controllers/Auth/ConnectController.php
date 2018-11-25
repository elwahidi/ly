<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConnectController extends Controller
{
    public function connect()
    {
        User::where('id',auth()->user()->id)->update([
            'updated_at'    => Carbon::now()
        ]);
        return 'connect';
    }
}
