<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    //
    public function events($week = null)
    {

        return view('classes', ['week' => $week]);
    }
}
