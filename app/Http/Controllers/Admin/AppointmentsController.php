<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\User;

class AppointmentsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('appointment_access'), 403);

        $appointments = Appointment::all();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('appointment_create'), 403);

        $citizens = User::all()->pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('citizens'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        abort_unless(\Gate::allows('appointment_create'), 403);

        $appointment = Appointment::create($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_unless(\Gate::allows('appointment_edit'), 403);

        $citizens = User::all()->pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('citizen');

        return view('admin.appointments.edit', compact('citizens', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        abort_unless(\Gate::allows('appointment_edit'), 403);

        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_unless(\Gate::allows('appointment_show'), 403);

        $appointment->load('citizen');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_unless(\Gate::allows('appointment_delete'), 403);

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
