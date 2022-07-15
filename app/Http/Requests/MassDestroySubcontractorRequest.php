<?php

namespace App\Http\Requests;

use App\Models\Subcontractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubcontractorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subcontractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subcontractors,id',
        ];
    }
}
