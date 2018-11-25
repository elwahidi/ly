@extends("layouts.app")
@section('page-title')
    {{ __('calendar.user.index') }}
@stop
@section('content')

<div class="content container-fluid">

    <div class="row">
        <div class="col-sm-8 col-xs-6">
            <h4 class="page-title">Calendar</h4>
        </div>
        <div class="col-sm-4 col-xs-6 text-right m-b-30">
            <a href="#" class="btn btn-primary rounded" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box m-b-0">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-content modal-md">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Event</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-primary btn-lg save-event">Create event</button>
                            <button type="button" class="btn btn-danger btn-lg delete-event" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@push('custom-scripts')

    <script type="text/javascript" src="{{asset('js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main-calendar-company.js')}}"></script>
@endpush

@stop
