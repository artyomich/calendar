@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
    <div class="card-header">
        {{ trans('global.systemCalendar') }}

        <select onchange="reloadCalendar(event)">
            <option value="0" {{ !isset($filterSpec) ? 'selected' : '' }}>-- выбор --</option>
            @foreach($specializations as $id => $specializations)
                <option value="{{ $specializations->id }}" {{ (isset($filterSpec) && ($filterSpec == $specializations->id )) ? ' selected' : '' }}>{{ $specializations->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="card-body">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'></div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    function reloadCalendar(event) {
        //console.log($(event.target));
        let searchParams = new URLSearchParams(window.location.search);
        searchParams.set('specialization_id',$(event.target).val());

        window.location.replace('?'+searchParams);
    }
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here START
                firstDay: 1,
                weekends: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','οюнь','οюль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
                dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
                dayNamesShort: ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
                buttonText: {
                    prev: "◄",
                    next: "►",
                    prevYear: "◄◄",
                    nextYear: "►►",
                    today: "Сегодня",
                    month: "Месяц",
                    week: "Неделя",
                    day: "День"
                },
                // put your options and callbacks here END

                events: events,
            })
        });
</script>
@stop
