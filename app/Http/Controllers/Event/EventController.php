<?php

namespace App\Http\Controllers\Event;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event\Event;

class EventController extends Controller
{
    public function index(){

        $today = Carbon::today()->format('Y-m-d');

        $upcomingEvents = Event::where('end_date', '>', $today)
        ->orderBy('start_date', 'desc')
        ->get();

        $pastEvents = Event::where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

        return view('events.list-event', compact('upcomingEvents','pastEvents'));
    }
}
