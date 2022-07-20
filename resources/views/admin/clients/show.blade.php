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
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.description') }}
                        </th>
                        <td>
                            {{ $client->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_code') }}
                        </th>
                        <td>
                            {{ $client->client_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_address') }}
                        </th>
                        <td>
                            {{ $client->client_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.contact_person') }}
                        </th>
                        <td>
                            {{ $client->contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.telephone_num') }}
                        </th>
                        <td>
                            {{ $client->telephone_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.city') }}
                        </th>
                        <td>
                            {{ $client->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.mou') }}
                        </th>
                        <td>
                            @if($client->mou)
                                <a href="{{ $client->mou->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.number_of_projects') }}
                        </th>
                        <td>
                           0
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
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
        @if(count($completed) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#completed" role="tab" data-toggle="tab">
                Completed
            </a>
        </li>
        @endif   
        @if(count($working) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#working" role="tab" data-toggle="tab">
                Working
            </a>
        </li>
        @endif   
        @if(count($disputes) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#disputes" role="tab" data-toggle="tab">
                Disputes
            </a>
        </li>
        @endif       
    </ul>
    <div class="tab-content">       
        <div class="tab-pane" role="tabpanel" id="completed">
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
                    @foreach($completed as $project)
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

        <div class="tab-pane" role="tabpanel" id="working">
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
                    @foreach($working as $project)
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

        <div class="tab-pane" role="tabpanel" id="disputes">
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
                    @foreach($disputes as $project)
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