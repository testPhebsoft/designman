<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'project_code' => [
                'string',
                'required',
                'unique:projects,project_code,' . request()->route('project')->id,
            ],
            'location' => [
                'string',
                'required',
            ],
            'estimated_cost' => [
                'string',
                'nullable',
            ],
            'estimated_duration' => [
                'string',
                'nullable',
            ],
            'employees_assigned' => [                
                'nullable',
            ],
            'handled_as' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'venture_firm' => [                
                'nullable',
            ],
            'sub_contractors' => [                
                'nullable',
            ],
            'signing_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'implementation_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
