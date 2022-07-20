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


<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
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