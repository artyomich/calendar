<?php

namespace App\Http\Requests;

use App\Specialization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroySpecializationRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('specialization_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:specializations,id',
        ];
    }
}
