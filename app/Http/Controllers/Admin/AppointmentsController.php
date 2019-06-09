<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Specialization;
use App\Timeslot;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('appointment_access'), 403);

        $appointments = Appointment::all();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create(Request $request)
    {
        abort_unless(\Gate::allows('appointment_create'), 403);

        $start_time = Carbon::createFromTimestamp($request->input('start_time'));
        $end_time = Carbon::createFromTimestamp($request->input('end_time'));

        $timeslots = Timeslot::where('start_time', $start_time)
            ->where('end_time', $end_time)->get();

        $timeslot = $timeslots->random();
        $timeslot_id = $timeslot->id;

        //$servant = User::find($request->input('servant_id'));
        $servant_id = $timeslot->servant_id;

        $specialization = Specialization::find($request->input('specialization_id'));
        $specialization_id = $specialization->id;

        return view('admin.appointments.create',compact('start_time','end_time','servant_id','specialization','specialization_id','timeslot_id'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        abort_unless(\Gate::allows('appointment_create'), 403);

        $data = $request->all();
        $data['citizen_id'] = Auth::id();

        Appointment::create($data);
        //dd($data);

        //active = 0; //ставим в резерв Таймслот чтоб в календаре не отображать
        Timeslot::where('id', $data['timeslot_id'])->update(['active' => 0]);

        return redirect()->route('admin.appointments.index',$data);
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
