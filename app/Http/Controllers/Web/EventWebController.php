<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventWebController extends Controller
{
    function index(): View
    {
        return view('web.events.pages.index');
    }
}
