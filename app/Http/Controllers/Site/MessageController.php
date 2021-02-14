<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('site.message.index');
    }
}
