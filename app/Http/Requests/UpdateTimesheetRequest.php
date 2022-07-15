<?php

namespace App\Http\Requests;

use App\Models\Timesheet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTimesheetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('timesheet_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
