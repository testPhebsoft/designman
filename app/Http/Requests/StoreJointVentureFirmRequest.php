<?php

namespace App\Http\Requests;

use App\Models\JointVentureFirm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJointVentureFirmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('joint_venture_firm_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'firm_name' => [
                'string',
                'required',
            ],
            'firm_code' => [
                'string',
                'required',
            ],
            'contract_person' => [
                'string',
                'nullable',
            ],
            'leading_firm_name' => [
                'string',
                'nullable',
            ],
            'share_value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
