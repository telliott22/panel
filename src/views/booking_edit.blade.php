@extends('panelViews::mainTemplate')
@section('page-wrapper')


     <section class="col-xs-12">
          <h1>Booking Details</h1>

          <div class="col-xs-6">
              <h3>User Details</h3>
                 <p>Name: {{$booking->full_name}}</p>
                 <p>Email: {{$booking->email}}</p>
                 <p>Mobile : {{$booking->mobile}}</p>
                 <p>Landline : {{$booking->landline}}</p>
                 <p>Address: {{$booking->address}}</p>
                 <p>Postcode: {{$booking->postcode}}</p>
                 <p>Bio: {{$booking->bio}}</p>
                 <p>Student status: {{$booking->student_status}}</p>
                 <p>University: {{$booking->university}}</p>
                 <p>Study year: {{$booking->study_year}}</p>
              <h3>Venue Owner Details</h3>
                 <p>Name : {{$booking->venue_full_name}}</p>
                 <p>Mobile : {{$booking->venue_mobile}}</p>
                 <p>Landline : {{$booking->venue_landline}}</p>
                 <p>Email: {{$booking->venue_email}}</p>
                 <p>Postcode: {{$booking->postcode}}</p>
          </div>
          <div class="col-xs-6">
                <h3>Venue Details</h3>
                   <p>Name: {{$booking->name}}</p>
                   <p>Address: {{$booking->location}}</p>
                   <p>Capacity : {{$booking->capacity}}</p>
                   <pre>Capacity : {{$booking->venue_description}}</pre>

         </div>
         <div class="col-xs-12">
        <h3>Booking Details</h3>

         {{--<form class="form-horizontal" id="booking-edit" role="form" method="POST" action="{{ url('/venues/edit-venue') }}">--}}
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
            {{--<input type="hidden" name="booking_id" value="{{$booking->booking_id}}">--}}

            {{--<div class="form-group">--}}
                {{--<label class="col-md-4 control-label" for="date_time">Date and Time</label>--}}
                {{--<div class="col-md-6">--}}
                    {{--<input type="datetime" name="date_time" value="{{$booking->date_time}}">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label class="col-md-4 control-label" id="date_time" for="booking_description">Date and Time</label>--}}
                {{--<textarea name="booking_description">--}}
                    {{--{{$booking->booking_description}}--}}
                {{--</textarea>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label class="col-md-4 control-label" for="booking_status">Action</label>--}}
                {{--<div class="col-md-6">--}}
                    {{--<select name="booking_status" >--}}
                        {{--<option value="0"></option>--}}
                        {{--<option value="1">Confirm</option>--}}
                        {{--<option value="2">Reject</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}

             {{--<div class="form-group">--}}
                {{--<div class="col-md-6 col-md-offset-4">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                        {{--Submit--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
          {{--</form>--}}



         </div>
     </section>

    <p>
        {!! $edit !!}
    </p>

    <script type="text/javascript">


        $(document).ready(function(){
            $('#date_time').datepicker();
        });


    </script>
@stop

