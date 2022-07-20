<?php

namespace App\Http\Requests;

use App\Models\Dispute;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDisputeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dispute_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
            'documents' => [
                'array',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
