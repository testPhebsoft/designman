<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with(['department_head'])->get();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_heads = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.departments.create', compact('department_heads'));
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $department->id]);
        }

        return redirect()->route('admin.departments.index');
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department_heads = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $department->load('department_head');

        return view('admin.departments.edit', compact('department', 'department_heads'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->all());

        return redirect()->route('admin.departments.index');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->load('department_head', 'departmentUsers');

        return view('admin.departments.show', compact('department'));
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('department_create') && Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Department();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
