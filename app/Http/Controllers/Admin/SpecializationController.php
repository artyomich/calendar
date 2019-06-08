<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySpecializationRequest;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use App\Specialization;

class SpecializationController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('specialization_access'), 403);

        $specializations = Specialization::all();

        return view('admin.specializations.index', compact('specializations'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('specialization_create'), 403);

        return view('admin.specializations.create');
    }

    public function store(StoreSpecializationRequest $request)
    {
        abort_unless(\Gate::allows('specialization_create'), 403);

        $specialization = Specialization::create($request->all());

        return redirect()->route('admin.specializations.index');
    }

    public function edit(Specialization $specialization)
    {
        abort_unless(\Gate::allows('specialization_edit'), 403);

        return view('admin.specializations.edit', compact('specialization'));
    }

    public function update(UpdateSpecializationRequest $request, Specialization $specialization)
    {
        abort_unless(\Gate::allows('specialization_edit'), 403);

        $specialization->update($request->all());

        return redirect()->route('admin.specializations.index');
    }

    public function show(Specialization $specialization)
    {
        abort_unless(\Gate::allows('specialization_show'), 403);

        return view('admin.specializations.show', compact('specialization'));
    }

    public function destroy(Specialization $specialization)
    {
        abort_unless(\Gate::allows('specialization_delete'), 403);

        $specialization->delete();

        return back();
    }

    public function massDestroy(MassDestroySpecializationRequest $request)
    {
        Specialization::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
