@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.milestone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.milestones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.milestone.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.milestone.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.milestone.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.milestone.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hourly_rate">{{ trans('cruds.milestone.fields.hourly_rate') }}</label>
                <input class="form-control {{ $errors->has('hourly_rate') ? 'is-invalid' : '' }}" type="number" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate', '') }}" step="0.01" required>
                @if($errors->has('hourly_rate'))
                    <span class="text-danger">{{ $errors->first('hourly_rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.hourly_rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.milestone.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <span class="text-danger">{{ $errors->first('project') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.milestone.fields.project_helper') }}</span>
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