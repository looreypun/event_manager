<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Seminar List
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $events = Event::where('hold_date', '>=', Carbon::now())->get();

        return view('front.event.index', compact('events'));
    }
}
