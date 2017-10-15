@extends('layouts.html')

@section('content')
    <form action="{{ route('save-event') }}" method="post" id="locationForm">
        <div class="container-fluid">
            <div class="container">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Event</h3>
                        </div>

                        <div class="panel-body">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter the event">
                                <span class="error">{{ $errors->first('title') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Address</label>
                                <textarea type="text" name="address" id="address" class="form-control" placeholder="Enter Address"></textarea>
                                <span class="error">{{ $errors->first('address') }}</span>
                            </div>


                            <div class="form-group">
                                <label for="title">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Enter Valid Date">
                                <span class="error">{{ $errors->first('start_date') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Enter Valid Date">
                                <span class="error">{{ $errors->first('end_date') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                                <span class="error">{{ $errors->first('description') }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn-block btn btn-success">
                                    <i class="fa fa-save"></i> SAVE</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6" id="app">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Select Location</h3>
                        </div>



                        <div class="panel-body">
                            <span class="error">{{ $errors->first('lat') }}</span>
                            <span class="error">{{ $errors->first('long') }}</span>
                            <event-location></event-location>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection