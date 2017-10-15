<?php

namespace App\Modules\Event\Http\Controllers;
use App\Modules\Event\Repositories\EventsRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Event\Event;
use Auth;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;

/**
 * @property EventsRepository event
 */
class EventsController extends Controller
{

    private $events;
    /**
     * EventsController constructor.
     * @param EventsRepository $eventsRepository
     */
    public function __construct(EventsRepository $eventsRepository)
    {
        $this->events = $eventsRepository;
    }

    public function index()
    {

        $upcomingEvents = $this->events->getUpcomingEvents();

        $pastEvents = $this->events->getPastEvents();

        return view('events.list-event', compact('upcomingEvents', 'pastEvents'));
    }

    public function view(Event $event)
    {
        return view('events.view-event', compact('event'));
    }

    public function add()
    {
        return view('events.add');
    }

    /**
     * @param Request $request
     * @return $this
     */
//    public function store(Request $request)
//    {
//
//
//        Event::create([
//            'title' => $request->input('title'),
//            'description' => $request->input('description'),
//            'location' => $request->input('location'),
//            'start_date' => $request->input('start_date'),
//            'end_date' => $request->input('end_date'),
//            'lat' => $request->input('lat'),
//            'long' => $request->input('lng'),
//            'address' => $request->input('address'),
//            'user_id' => $request->user()->id,
//        ]);
//
//    }


    public function store(Request $data)
    {

        $validator = Validator::make($data->all(), [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $event = new Event();

        $event->user_id = $user->id;
        $event->title = $data['title'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];
        $event->lat = $data['lat'];
        $event->long = $data['lng'];
        $event->address = $data['address'];

        //$event->slug = Str::slug($data['title']);

        //dd($event);

        $event->save();

        //store status message
        //Session::flash('msg', 'Event added successfully!');

        return redirect()->route('events');
    }
}