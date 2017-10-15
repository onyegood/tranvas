@extends('layouts.html')

@section('content')

    <div class="row">

        <div class="col-md-8 col-sm-push-2">

            <h1>Upcoming Events
                <span class="pull-right">
                    <a href="{{ route('add-event') }}" class="btn btn-success">Add Event</a>
                </span>
            </h1>

            @foreach($upcomingEvents as $event)

                {{ dump($event->toArray()) }}

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3>
                            <a href="{{ route('view-event', $event->id) }}">
                               {{ $event->id }} {{ $event->title }}
                            </a>
                        </h3>

                        <small class="padding-left-10">{{ $event->address }}</small>

                    </div>

                    <div class="panel-body">

                        <div class="meta-data margin-bottom-20">

                            <strong>Start Date: </strong>{{ $event->start_date }} <br/>

                            <strong>End Date: </strong>{{ $event->end_date }} <br/>

                            <strong>Created By: </strong>{{ $event->creator->name }} <br/>


                        </div>

                        <div class="description">
                            <p>{{ $event->description }}</p>
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

    @if(count($pastEvents) == 0)
        <div class="row">
            <h3>No Past Events</h3>
        </div>
    @else

        <div class="row">

            <div class="col-md-8 col-sm-push-2">

                <h1>Past Events</h1>

                @foreach($pastEvents as $past)
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <a href="{{ route('view-event', $past->id) }}">
                               {{ $past->id }} {{ $past->title }}
                            </a>

                            <small class="padding-left-10">{{ $past->address }}</small>

                        </div>

                        <div class="panel-body">

                        <div class="meta-data margin-bottom-20">

                            <strong>Start Date: </strong>{{ $past->start_date }} <br/>

                            <strong>End Date: </strong>{{ $past->end_date }} <br/>

                            <strong>Created By: </strong>{{ $past->creator->name }} <br/>


                        </div>

                        <div class="description">
                            <p>{{ $past->description }}</p>
                        </div>

                    </div>

                    </div>
                @endforeach

            </div>

        </div>

    @endif
@endsection