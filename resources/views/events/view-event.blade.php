@extends('layout.html')

@section('content')

    <div class="row">

        <div class="col-md-8 col-sm-push-2">

            <h1>Event Detail</h1>

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3>
                            <a href="{{ route('view-event', $event->id) }}">
                                {{ $event->id }} {{ $event->title }}
                            </a>
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="description">
                            <p>{{ $event->description }}</p>
                        </div>
                    </div>

                    <div id="map"></div>

                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                            <tr>
                                <td>Start Date: </td>
                                <td>{{ $event->start_date }} </td>
                            </tr>

                            <tr>
                                <td>End Date: </td>
                                <td>{{ $event->end_date }} </td>
                            </tr>

                            <tr>
                                <td>Address: </td>
                                <td>{{ $event->address }} </td>
                            </tr>

                            <tr>
                                <td>Creator: </td>
                                <td>{{ $event->creator->name }} </td>
                            </tr>
                        </tbody>

                    </table>


                </div>

        </div>

    </div>
@endsection

@section('footer-script')
    <script>
        function initMap() {
            var uluru = {lat: {{$event->lat}}, lng: {{$event->long}} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });

            var marker = new google.maps.Marker({
               position: uluru,
               map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDADmqF9bGWb54XqWj24J_us4UD1KuYRog&callback=initMap">
    </script>

@endsection

@section('header-styles')
    <style>
        #map{
            height: 400px;
            width: 100%;
        }
    </style>
@endsection
