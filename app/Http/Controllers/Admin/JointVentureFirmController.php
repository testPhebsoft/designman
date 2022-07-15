<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJointVentureFirmRequest;
use App\Http\Requests\StoreJointVentureFirmRequest;
use App\Http\Requests\UpdateJointVentureFirmRequest;
use App\Models\JointVentureFirm;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JointVentureFirmController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('joint_venture_firm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jointVentureFirms = JointVentureFirm::all();

        return view('admin.jointVentureFirms.index', compact('jointVentureFirms'));
    }

    public function create()
    {
        abort_if(Gate::denies('joint_venture_firm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jointVentureFirms.create');
    }

    public function store(StoreJointVentureFirmRequest $request)
    {
        $jointVentureFirm = JointVentureFirm::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jointVentureFirm->id]);
        }

        return redirect()->route('admin.joint-venture-firms.index');
    }

    public function edit(JointVentureFirm $jointVentureFirm)
    {
        abort_if(Gate::denies('joint_venture_firm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jointVentureFirms.edit', compact('jointVentureFirm'));
    }

    public function update(UpdateJointVentureFirmRequest $request, JointVentureFirm $jointVentureFirm)
    {
        $jointVentureFirm->update($request->all());

        return redirect()->route('admin.joint-venture-firms.index');
    }

    public function show(JointVentureFirm $jointVentureFirm)
    {
        abort_if(Gate::denies('joint_venture_firm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jointVentureFirms.show', compact('jointVentureFirm'));
    }

    public function destroy(JointVentureFirm $jointVentureFirm)
    {
        abort_if(Gate::denies('joint_venture_firm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jointVentureFirm->delete();

        return back();
    }

    public function massDestroy(MassDestroyJointVentureFirmRequest $request)
    {
        JointVentureFirm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('joint_venture_firm_create') && Gate::denies('joint_venture_firm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JointVentureFirm();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
