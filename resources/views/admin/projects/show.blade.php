@extends('layouts.admin')

@section('styles')

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #venture_table td, #venture_table th {
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
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
                        <td>
                            {{ $project->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.category') }}
                        </th>
                        <td>
                            {{ $project->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_code') }}
                        </th>
                        <td>
                            {{ $project->project_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.location') }}
                        </th>
                        <td>
                            {{ $project->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_nature') }}
                        </th>
                        <td>
                            {!! $project->project_nature !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_scope') }}
                        </th>
                        <td>
                            {!! $project->project_scope !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.estimated_cost') }}
                        </th>
                        <td>
                            {{ $project->estimated_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.estimated_duration') }}
                        </th>
                        <td>
                            {{ $project->estimated_duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.employees_assigned') }}
                        </th>
                        <td>
                            {{ $project->employees_assigned }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_head') }}
                        </th>
                        <td>
                            {{ $project->project_head->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.handled_as') }}
                        </th>
                        <td>
                            {{ App\Models\Project::HANDLED_AS_SELECT[$project->handled_as] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.venture_firm') }}
                        </th>
                        <td>
                            {{ $project->venture_firm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.sub_contractors') }}
                        </th>
                        <td>
                            {{ $project->sub_contractors }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.signing_date') }}
                        </th>
                        <td>
                            {{ $project->signing_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.implementation_date') }}
                        </th>
                        <td>
                            {{ $project->implementation_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Project::STATUS_SELECT[$project->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.agreement_atachment') }}
                        </th>
                        <td>
                            @if($project->agreement_atachment)
                                <a href="{{ $project->agreement_atachment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">       
        @if(count($ventures) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#ventures" role="tab" data-toggle="tab">
                Ventures
            </a>
        </li>
        @endif 
    </ul>
    <div class="tab-content">       
        <div class="tab-pane" role="tabpanel" id="ventures">
            <table id="venture_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Nature</th>                       
                        <th></th>                    
                    </tr> 
                </thead>   
                <tbody>
                    @foreach($ventures as $venture)
                    <tr>
                        <td>{{ $venture->firm_name }}</td>
                        <td>{{ $venture->code }}</td>
                        <td>{{ $venture->nature }}</td>                       
                        <td>
                            <a href="{{URL::to('/admin/joint-venture-firms/')}}/{{$venture->venture_id}}" target="_blank" class="btn btn-sm btn-info">Details</a>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>            
            </table>
        </div>

        
    </div>
</div>





@endsection