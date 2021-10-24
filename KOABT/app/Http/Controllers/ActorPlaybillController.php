<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorPlaybillController extends Controller
{
    public function index()
    {
        return view('actorPlaybill');
    }
}
