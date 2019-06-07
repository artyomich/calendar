@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.appointments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
