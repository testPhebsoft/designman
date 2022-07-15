<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
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
            'client_code' => [
                'string',
                'required',
            ],
            'client_address' => [
                'string',
                'nullable',
            ],
            'contact_person' => [
                'string',
                'nullable',
            ],
            'telephone_num' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'required',
            ],
        ];
    }
}
