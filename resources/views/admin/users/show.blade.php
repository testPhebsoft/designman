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
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.department') }}
                        </th>
                        <td>
                            {{ $user->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.image') }}
                        </th>
                        <td>
                            @if($user->image)
                                <a href="{{ $user->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.employee_code') }}
                        </th>
                        <td>
                            {{ $user->employee_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.father_name') }}
                        </th>
                        <td>
                            {{ $user->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.joining_date') }}
                        </th>
                        <td>
                            {{ $user->joining_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.designation') }}
                        </th>
                        <td>
                            {{ $user->designation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $user->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.contact_number') }}
                        </th>
                        <td>
                            {{ $user->contact_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.residence_address') }}
                        </th>
                        <td>
                            {{ $user->residence_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.cnic') }}
                        </th>
                        <td>
                            {{ $user->cnic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.citizenship') }}
                        </th>
                        <td>
                            {{ $user->citizenship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.disability') }}
                        </th>
                        <td>
                            {{ $user->disability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.blood_group') }}
                        </th>
                        <td>
                            {{ $user->blood_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.job_status') }}
                        </th>
                        <td>
                            {{ App\Models\User::JOB_STATUS_SELECT[$user->job_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.code_membership_professional') }}
                        </th>
                        <td>
                            {{ $user->code_membership_professional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.code_membership_attachment') }}
                        </th>
                        <td>
                            @if($user->code_membership_attachment)
                                <a href="{{ $user->code_membership_attachment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country_work_experience') }}
                        </th>
                        <td>
                            {{ $user->country_work_experience }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.language_reading') }}
                        </th>
                        <td>
                            <strong>  {{ $user->language_reading }} </strong>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.language_writing') }}
                        </th>
                        <td>
                            <strong>  {{ $user->language_writing }} </strong>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.language_speaking') }}
                        </th>
                        <td>
                            <strong>  {{ $user->language_speaking }} </strong>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.account_title') }}
                        </th>
                        <td>
                            {{ $user->account_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.account_num') }}
                        </th>
                        <td>
                            {{ $user->account_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $user->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.bank_branch') }}
                        </th>
                        <td>
                            {{ $user->bank_branch }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.job_duration') }}
                        </th>
                        <td>
                            {{ $user->job_duration }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
        <li class="nav-item hide">
            <a class="nav-link" href="#department_head_departments" role="tab" data-toggle="tab">
                {{ trans('cruds.department.title') }}
            </a>
        </li>
        <li class="nav-item hide">
            <a class="nav-link" href="#project_head_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        @if(count($educations) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#educations" role="tab" data-toggle="tab">
                Education
            </a>
        </li>
        @endif
        @if(count($promotions) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#promotions" role="tab" data-toggle="tab">
                Promotion History
            </a>
        </li>
        @endif
        @if(count($employment) != 0)
        <li class="nav-item">
            <a class="nav-link" href="#employments" role="tab" data-toggle="tab">
                Employment Record
            </a>
        </li>
        @endif
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="department_head_departments">
            @includeIf('admin.users.relationships.departmentHeadDepartments', ['departments' => $user->departmentHeadDepartments])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_head_projects">
            @includeIf('admin.users.relationships.projectHeadProjects', ['projects' => $user->projectHeadProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="educations">
            <table>
                <thead>
                    <tr>
                        <th>Degree</th>
                        <th>Educational Institute</th>
                        <th>Degree Duration</th>
                    </tr> 
                </thead>   
                <tbody>
                    @foreach($educations as $education)
                    <tr>
                        <td>{{ $education->degree_name }}</td>
                        <td>{{ $education->educational_institute }}</td>
                        <td>{{ $education->degree_duration }}</td>
                    </tr>
                    @endforeach                    
                </tbody>            
            </table>
        </div>

        <div class="tab-pane" role="tabpanel" id="promotions">
            <table>
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Date</th>                        
                    </tr> 
                </thead>   
                <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->designation }}</td>
                        <td>{{ $promotion->promotion_date }}</td>                        
                    </tr>
                    @endforeach                    
                </tbody>            
            </table>
        </div>

        <div class="tab-pane" role="tabpanel" id="employments">
            <table>
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Designation</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr> 
                </thead>   
                <tbody>
                    @foreach($employment as $emp)
                    <tr>
                        <td>{{ $emp->company_name }}</td>
                        <td>{{ $emp->designation }}</td>
                        <td>{{ $emp->start_date }}</td>
                        <td>{{ $emp->end_date }}</td>
                    </tr>
                    @endforeach                    
                </tbody>            
            </table>
        </div>
    </div>
</div>

@endsection