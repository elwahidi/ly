<?php

namespace App\Http\Controllers\Communication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('communication.index');
    }
}
