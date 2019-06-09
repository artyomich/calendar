<?php

namespace App\Http\Requests;

use App\Appointment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('appointment_edit');
    }

    public function rules()
    {
        return [
            'citizen_id' => [
                'required',
                'integer',
            ],
            'specialization_id' => [
                'required',
                'integer',
            ],
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
