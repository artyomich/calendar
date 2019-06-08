<?php

namespace App\Http\Requests;

use App\Timeslot;
use Illuminate\Foundation\Http\FormRequest;

class StoreTimeslotRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('timeslot_create');
    }

    public function rules()
    {
        return [
            'servant_id'        => [
                'required',
                'integer',
            ],
            'start_time'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time'          => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'specialization_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
