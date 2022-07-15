<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'department_id' => [
                'required',
                'integer',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'employee_code' => [
                'string',
                'required',
            ],
            'father_name' => [
                'string',
                'required',
            ],
            'joining_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'designation' => [
                'string',
                'required',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'contact_number' => [
                'string',
                'required',
            ],
            'cnic' => [
                'string',
                'nullable',
            ],
            'citizenship' => [
                'string',
                'required',
            ],
            'disability' => [
                'string',
                'required',
            ],
            'blood_group' => [
                'string',
                'required',
            ],
            'code_membership_professional' => [
                'string',
                'nullable',
            ],
            'account_title' => [
                'string',
                'required',
            ],
            'account_num' => [
                'string',
                'required',
            ],
            'bank_name' => [
                'string',
                'required',
            ],
            'bank_branch' => [
                'string',
                'nullable',
            ],
        ];
    }
}
