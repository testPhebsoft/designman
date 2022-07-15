@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subcontractor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subcontractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.id') }}
                        </th>
                        <td>
                            {{ $subcontractor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.name') }}
                        </th>
                        <td>
                            {{ $subcontractor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.code') }}
                        </th>
                        <td>
                            {{ $subcontractor->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.address') }}
                        </th>
                        <td>
                            {{ $subcontractor->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.contract_person') }}
                        </th>
                        <td>
                            {{ $subcontractor->contract_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.start_date') }}
                        </th>
                        <td>
                            {{ $subcontractor->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.end_date') }}
                        </th>
                        <td>
                            {{ $subcontractor->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.agreement') }}
                        </th>
                        <td>
                            @if($subcontractor->agreement)
                                <a href="{{ $subcontractor->agreement->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subcontractor.fields.assignment_value') }}
                        </th>
                        <td>
                            {{ $subcontractor->assignment_value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subcontractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection