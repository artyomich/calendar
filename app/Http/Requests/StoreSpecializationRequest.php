<?php

namespace App\Http\Requests;

use App\Specialization;
use Illuminate\Foundation\Http\FormRequest;

class StoreSpecializationRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('specialization_create');
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
