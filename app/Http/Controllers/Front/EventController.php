<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Seminar List
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $events = Event::with('rlSubImage')->get();

        return view('welcome', compact('events'));
    }
}
