@extends('layout.html')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-push-2">
    <h1>Upcoming Events</h1>
            @foreach($upcomingEvents as $event)

                <div class="panel-heading">
                    <h3>{{ $event->title }}</h3>
                    <small>{{ $event->address }}</small>
                </div>
                <div class="panel-body">
                    <p>{{ $event->description }}</p>
                </div>

            @endforeach
        </div>
    </div>
@endsection