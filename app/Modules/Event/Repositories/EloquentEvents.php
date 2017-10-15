<?php

namespace App\Modules\Event\Repositories;


use App\Modules\Event\Event;

use App\Repositories\AbstractRepository;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EloquentEvents extends AbstractRepository implements EventsRepository
{

    protected $model;

    /**
     * EloquentEvents constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        //Import Event Model
        $this->model = $event;
    }

    public function getUpcomingEvents()
    {
        $today = Carbon::today()->format('Y-m-d');

       $select = [
           'e.id',
           'e.title',
           'e.description',
           'e.address',
           'e.start_date',
           'e.end_date',
           'e.user_id',
           'e.user_id as user',
       ];

       return $this->model->select($select)
           ->from('events as e')
           ->leftJoin('participants as p', function($query){
               $query->on('p.event_id', '=', 'e.id');
               $query->where('p.user_id', Auth::user()->id);
           })
            ->where('e.end_date', '>', $today)
            ->orderBy('e.start_date', 'desc')
            ->get();
    }

    public function getPastEvents()
    {
        $today = Carbon::today()->format('Y-m-d');

       return $this->model
            ->where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();
    }

}