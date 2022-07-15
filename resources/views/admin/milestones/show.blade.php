@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.milestone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.milestones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.id') }}
                        </th>
                        <td>
                            {{ $milestone->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.title') }}
                        </th>
                        <td>
                            {{ $milestone->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.description') }}
                        </th>
                        <td>
                            {{ $milestone->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.start_date') }}
                        </th>
                        <td>
                            {{ $milestone->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.end_date') }}
                        </th>
                        <td>
                            {{ $milestone->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.hourly_rate') }}
                        </th>
                        <td>
                            {{ $milestone->hourly_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.milestone.fields.project') }}
                        </th>
                        <td>
                            {{ $milestone->project->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.milestones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection