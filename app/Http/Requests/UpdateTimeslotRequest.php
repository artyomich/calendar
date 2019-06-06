<?php

namespace App\Http\Requests;

use App\Timeslot;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeslotRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('timeslot_edit');
    }

    public function rules()
    {
        return [
            'servant_id' => [
                'required',
                'integer',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time'   => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
