@extends('layouts.admin')
@section('content')

<div class="container">    
    <div class="card shadow-xl">
        <div class="card-header">
            Calendar
        </div>

        <div class="card-body">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            <div id='calendar'></div>
        </div>
    </div>
</div>

@endsection

@push('script-alt')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
           
            bookings={!! json_encode($bookings) !!};
          
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: bookings


            });
        });
</script>

@endpush