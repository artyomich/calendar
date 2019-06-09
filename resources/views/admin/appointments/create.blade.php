@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.appointments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf


            <input type="hidden" name="specialization_id" value="{{ $specialization_id }}">
            <input type="hidden" name="servant_id" value="{{ $servant_id }}">
            <input type="text" name="timeslot_id" value="timeslot_id">

            <label for="name">{{ trans('cruds.specialization.fields.name') }}</label>
            <input type="text" id="specialization" name="specialization" class="form-control" value="{{ old('specialization', isset($specialization) ? $specialization->name : '') }}">
            @if($errors->has('specialization'))
                <p class="help-block">
                    {{ $errors->first('specialization') }}
                </p>
            @endif
            <p class="helper-block">
                {{ trans('cruds.specialization.fields.name_helper') }}
            </p>

            <input type="text" id="servant" name="servant" class="form-control" value="{{ old('servant', isset($servant) ? $servant->surname : '') }}">
            @if($errors->has('servant'))
            <p class="helper-block">
                {{ trans('cruds.servant.fields.name_helper') }}
            </p>
            @endif
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.appointment.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($start_time) ? $start_time->toDateTimeString() : '') }}" required>
                @if($errors->has('start_time'))
                    <p class="help-block">
                        {{ $errors->first('start_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.appointment.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($end_time) ? $end_time->toDateTimeString() : '') }}" required>
                @if($errors->has('end_time'))
                    <p class="help-block">
                        {{ $errors->first('end_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.end_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
