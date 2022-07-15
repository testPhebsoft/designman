@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jointVentureFirm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.joint-venture-firms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.id') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.code') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.firm_name') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->firm_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.firm_code') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->firm_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.address') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.contract_person') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->contract_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.joint_venture_nature') }}
                        </th>
                        <td>
                            {!! $jointVentureFirm->joint_venture_nature !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.leading_firm_name') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->leading_firm_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jointVentureFirm.fields.share_value') }}
                        </th>
                        <td>
                            {{ $jointVentureFirm->share_value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.joint-venture-firms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection