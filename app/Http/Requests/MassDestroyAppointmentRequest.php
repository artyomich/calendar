<?php

namespace App\Http\Requests;

use App\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('appointment_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:appointments,id',
        ];
    }
}
