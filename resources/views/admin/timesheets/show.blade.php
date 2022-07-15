@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.timesheet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.timesheets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.id') }}
                        </th>
                        <td>
                            {{ $timesheet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.title') }}
                        </th>
                        <td>
                            {{ $timesheet->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.task') }}
                        </th>
                        <td>
                            {{ $timesheet->task->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.user') }}
                        </th>
                        <td>
                            {{ $timesheet->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.date') }}
                        </th>
                        <td>
                            {{ $timesheet->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.start_time') }}
                        </th>
                        <td>
                            {{ $timesheet->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.end_time') }}
                        </th>
                        <td>
                            {{ $timesheet->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.description') }}
                        </th>
                        <td>
                            {{ $timesheet->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timesheet.fields.approved_user') }}
                        </th>
                        <td>
                            {{ $timesheet->approved_user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.timesheets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection