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
            right: 'listDay,listWeek,month'
        },
       listDay: { buttonText: 'list day' },
        listWeek: { buttonText: 'list week' },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        navLinks: true,
        defaultView: 'listWeek',
        events: [
            @foreach ($zaKalendar as $z)
               
           
            {
                title: 'Klijent: {{$z->name}}, Vozilo: - {{$z->proizvodjac}} / {{$z->model}} / Broj motora: {{$z->brojMotora}} / {{$z->snaga}}kw / Broj vrata: {{$z->brojVrata}} / Kubikaža: {{$z->kubikaza}}',
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
