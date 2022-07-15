<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'key' => [
                'string',
                'required',
                'unique:settings,key,' . request()->route('setting')->id,
            ],
            'value' => [
                'string',
                'required',
            ],
        ];
    }
}
