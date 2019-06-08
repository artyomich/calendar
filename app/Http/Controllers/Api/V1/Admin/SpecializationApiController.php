<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;
use App\Specialization;

class SpecializationApiController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();

        return $specializations;
    }

    public function store(StoreSpecializationRequest $request)
    {
        return Specialization::create($request->all());
    }

    public function update(UpdateSpecializationRequest $request, Specialization $specialization)
    {
        return $specialization->update($request->all());
    }

    public function show(Specialization $specialization)
    {
        return $specialization;
    }

    public function destroy(Specialization $specialization)
    {
        return $specialization->delete();
    }
}
