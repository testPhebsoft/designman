<?php

namespace App\Http\Requests;

use App\Models\JointVentureFirm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJointVentureFirmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('joint_venture_firm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:joint_venture_firms,id',
        ];
    }
}
