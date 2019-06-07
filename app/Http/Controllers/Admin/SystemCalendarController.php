<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Timeslot;

class SystemCalendarController extends Controller
{
    public $sources = [

    ];

    public function index()
    {
        $events = [];

        foreach (Timeslot::with('servant')->get() as $timeslot) {

                $crudFieldValue = $timeslot->getOriginal('start_time');

                if (!$crudFieldValue) {
                    continue;
                }

                $eventLabel = $timeslot->start_time;
                $prefix = "";
                $suffix = "";
                $start_time = new Carbon($timeslot->start_time);
                $end_time = new Carbon($timeslot->end_time);
                $events[] = [
                    'title' => $timeslot->servant->surname . ' ' . $start_time->format('H:i') . ' ' . $end_time->format('H:i'),
                    'start' => $crudFieldValue,
                    'url'   => route('admin.appointments.create') . '?timeslot_id=' . $timeslot->id,
                ];
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
