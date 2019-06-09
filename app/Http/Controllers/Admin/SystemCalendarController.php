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
        foreach (Timeslot::with('specialization')
                     ->select('start_time','end_time','specialization_id','active')
                     ->where('specialization_id',$filterSpec)
                     ->where('active',1)
                     ->distinct()
                     ->get() as $timeslot) {

                $crudFieldValue = $timeslot->getOriginal('start_time');

                if (!$crudFieldValue){
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

        return view('admin.calendar.calendar', compact('events','specializations', 'filterSpec'));
    }
}
