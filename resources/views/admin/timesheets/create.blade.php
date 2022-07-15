@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timesheet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.timesheets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.timesheet.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="task_id">{{ trans('cruds.timesheet.fields.task') }}</label>
                <select class="form-control select2 {{ $errors->has('task') ? 'is-invalid' : '' }}" name="task_id" id="task_id">
                    @foreach($tasks as $id => $entry)
                        <option value="{{ $id }}" {{ old('task_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('task'))
                    <span class="text-danger">{{ $errors->first('task') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.task_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.timesheet.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.timesheet.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.timesheet.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time">{{ trans('cruds.timesheet.fields.end_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.timesheet.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_user_id">{{ trans('cruds.timesheet.fields.approved_user') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_user') ? 'is-invalid' : '' }}" name="approved_user_id" id="approved_user_id">
                    @foreach($approved_users as $id => $entry)
                        <option value="{{ $id }}" {{ old('approved_user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_user'))
                    <span class="text-danger">{{ $errors->first('approved_user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timesheet.fields.approved_user_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection