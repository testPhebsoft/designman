<?php

namespace App\Http\Requests;

use App\Models\Milestone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMilestoneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('milestone_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'hourly_rate' => [
                'required',
            ],
        ];
    }
}
