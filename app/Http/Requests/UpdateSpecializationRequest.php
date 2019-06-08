<?php

namespace App\Http\Requests;

use App\Specialization;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecializationRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('specialization_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
