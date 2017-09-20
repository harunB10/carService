<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Početna</div>

                <div class="panel-body">

                    <div class="box-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>

    $(function() {

    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        monthNames: ['Januar','Februar','Mart','April','Maj','Juni','Juli','August','Septembar','Oktobar','Novembar','Decembar'],
        monthNamesShort: ['Jan','Feb','Mar','Apr','Maj','Jun','Jul','Aug','Sep','Okt','Nov','Dec'],
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        navLinks: true,
        events: [
            @foreach ($zaKalendar as $z)
               
           
            {
                title: '{{$z->name}}',
                start: '{{$z->startTime}}T{{$z->end}}',
                @if ($z->vrstaServisa === "Veliki servis")
                    color: 'red'
                    @elseif($z->vrstaServisa === "Mali servis")
                    color: 'green'
                    @else
                    color: 'orange'
                @endif
               
            },
             @endforeach
        ],
        timeFormat: 'H:mm',
        firstDay: 1
    });
});

</script>
<style>



    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>
