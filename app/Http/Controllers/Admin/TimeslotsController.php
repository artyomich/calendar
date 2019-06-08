<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTimeslotRequest;
use App\Http\Requests\StoreTimeslotRequest;
use App\Http\Requests\UpdateTimeslotRequest;
use App\Specialization;
use App\Timeslot;
use App\User;

class TimeslotsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('timeslot_access'), 403);

        $timeslots = Timeslot::all();

        return view('admin.timeslots.index', compact('timeslots'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('timeslot_create'), 403);

        $servants = User::all()->pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specializations = Specialization::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.timeslots.create', compact('servants', 'specializations'));
    }

    public function store(StoreTimeslotRequest $request)
    {
        abort_unless(\Gate::allows('timeslot_create'), 403);

        $timeslot = Timeslot::create($request->all());

        return redirect()->route('admin.timeslots.index');
    }

    public function edit(Timeslot $timeslot)
    {
        abort_unless(\Gate::allows('timeslot_edit'), 403);

        $servants = User::all()->pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $specializations = Specialization::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timeslot->load('servant');

        return view('admin.timeslots.edit', compact('servants', 'timeslot','specializations'));
    }

    public function update(UpdateTimeslotRequest $request, Timeslot $timeslot)
    {
        abort_unless(\Gate::allows('timeslot_edit'), 403);

        $timeslot->update($request->all());

        return redirect()->route('admin.timeslots.index');
    }

    public function show(Timeslot $timeslot)
    {
        abort_unless(\Gate::allows('timeslot_show'), 403);

        $timeslot->load('servant', 'specialization');

        return view('admin.timeslots.show', compact('timeslot'));
    }

    public function destroy(Timeslot $timeslot)
    {
        abort_unless(\Gate::allows('timeslot_delete'), 403);

        $timeslot->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeslotRequest $request)
    {
        Timeslot::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
