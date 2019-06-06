<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeslotRequest;
use App\Http\Requests\UpdateTimeslotRequest;
use App\Timeslot;

class TimeslotsApiController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::all();

        return $timeslots;
    }

    public function store(StoreTimeslotRequest $request)
    {
        return Timeslot::create($request->all());
    }

    public function update(UpdateTimeslotRequest $request, Timeslot $timeslot)
    {
        return $timeslot->update($request->all());
    }

    public function show(Timeslot $timeslot)
    {
        return $timeslot;
    }

    public function destroy(Timeslot $timeslot)
    {
        return $timeslot->delete();
    }
}
