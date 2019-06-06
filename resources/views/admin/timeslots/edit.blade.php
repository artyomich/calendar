@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.timeslot.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.timeslots.update", [$timeslot->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('servant_id') ? 'has-error' : '' }}">
                <label for="servant">{{ trans('cruds.timeslot.fields.servant') }}*</label>
                <select name="servant_id" id="servant" class="form-control select2" required>
                    @foreach($servants as $id => $servant)
                        <option value="{{ $id }}" {{ (isset($timeslot) && $timeslot->servant ? $timeslot->servant->id : old('servant_id')) == $id ? 'selected' : '' }}>{{ $servant }}</option>
                    @endforeach
                </select>
                @if($errors->has('servant_id'))
                    <p class="help-block">
                        {{ $errors->first('servant_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.timeslot.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($timeslot) ? $timeslot->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <p class="help-block">
                        {{ $errors->first('start_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.timeslot.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.timeslot.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($timeslot) ? $timeslot->end_time : '') }}" required>
                @if($errors->has('end_time'))
                    <p class="help-block">
                        {{ $errors->first('end_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.timeslot.fields.end_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection