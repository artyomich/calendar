<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Specialization;
use Carbon\Carbon;
use App\Timeslot;
use Illuminate\Http\Request;


class SystemCalendarController extends Controller
{
    public $sources = [

    ];

    public function index(Request $request)
    {
        $events = [];

        $specializations = Specialization::all();



        $filterSpec = $request->input('specialization_id');
        foreach (Timeslot::with('servant','specialization')->where('specialization_id',$filterSpec)->get() as $timeslot) {

                $crudFieldValue = $timeslot->getOriginal('start_time');
                $active = $timeslot->getAttribute('active');

                if ((!$crudFieldValue)||(!$active)){
                    continue;
                }

                $eventLabel = $timeslot->start_time;
                $prefix = "";
                $suffix = "";
                $start_time = new Carbon($timeslot->start_time);
                $end_time = new Carbon($timeslot->end_time);
                $events[] = [
                    'title' => $start_time->format('H:i') . ' - ' . $end_time->format('H:i'),
                    'start' => $crudFieldValue,
                    'url'   => route('admin.appointments.create') . '?start_time=' . $start_time->getTimestamp() .  '&end_time=' . $end_time->getTimestamp().  '&specialization_id=' . $timeslot->specialization->id,
                ];
        }

        return view('admin.calendar.calendar', compact('events','specializations'));
    }
}
