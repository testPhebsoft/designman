<?php

namespace App\Http\Requests;

use App\Models\Subcontractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubcontractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subcontractor_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'contract_person' => [
                'string',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'assignment_value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
