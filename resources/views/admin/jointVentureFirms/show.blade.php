@extends('layouts.admin')

@section('styles')

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;

    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

@endsection

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



<div class="card">
    @if(count($projects) != 0)
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
    @endif
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">       
        @if(count($projects) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#projects" role="tab" data-toggle="tab">
                Projects
            </a>
        </li>
        @endif       
    </ul>
    <div class="tab-content">       
        <div class="tab-pane" role="tabpanel" id="projects">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Location</th>
                        <th>Handled As</th>
                        <th>Signing Date</th>
                        <th>Implementation Date</th>    
                        <th></th>                    
                    </tr> 
                </thead>   
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->project_code }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ $project->handled_as }}</td>
                        <td>{{ $project->signing_date }}</td>
                        <td>{{ $project->implementation_date }}</td>
                        <td>
                            <a href="{{URL::to('/admin/projects/')}}/{{$project->id}}" target="_blank" class="btn btn-sm btn-info">Details</a>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>            
            </table>
        </div>
      
    </div>
</div>




@endsection