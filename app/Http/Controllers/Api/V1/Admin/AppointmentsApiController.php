<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentsApiController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();

        return $appointments;
    }

    public function store(StoreAppointmentRequest $request)
    {
        return Appointment::create($request->all());
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        return $appointment->update($request->all());
    }

    public function show(Appointment $appointment)
    {
        return $appointment;
    }

    public function destroy(Appointment $appointment)
    {
        return $appointment->delete();
    }
}
