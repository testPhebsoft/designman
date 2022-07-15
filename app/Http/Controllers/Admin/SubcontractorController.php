<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubcontractorRequest;
use App\Http\Requests\StoreSubcontractorRequest;
use App\Http\Requests\UpdateSubcontractorRequest;
use App\Models\Subcontractor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubcontractorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('subcontractor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcontractors = Subcontractor::with(['media'])->get();

        return view('admin.subcontractors.index', compact('subcontractors'));
    }

    public function create()
    {
        abort_if(Gate::denies('subcontractor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subcontractors.create');
    }

    public function store(StoreSubcontractorRequest $request)
    {
        $subcontractor = Subcontractor::create($request->all());

        if ($request->input('agreement', false)) {
            $subcontractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement'))))->toMediaCollection('agreement');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subcontractor->id]);
        }

        return redirect()->route('admin.subcontractors.index');
    }

    public function edit(Subcontractor $subcontractor)
    {
        abort_if(Gate::denies('subcontractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subcontractors.edit', compact('subcontractor'));
    }

    public function update(UpdateSubcontractorRequest $request, Subcontractor $subcontractor)
    {
        $subcontractor->update($request->all());

        if ($request->input('agreement', false)) {
            if (!$subcontractor->agreement || $request->input('agreement') !== $subcontractor->agreement->file_name) {
                if ($subcontractor->agreement) {
                    $subcontractor->agreement->delete();
                }
                $subcontractor->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement'))))->toMediaCollection('agreement');
            }
        } elseif ($subcontractor->agreement) {
            $subcontractor->agreement->delete();
        }

        return redirect()->route('admin.subcontractors.index');
    }

    public function show(Subcontractor $subcontractor)
    {
        abort_if(Gate::denies('subcontractor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subcontractors.show', compact('subcontractor'));
    }

    public function destroy(Subcontractor $subcontractor)
    {
        abort_if(Gate::denies('subcontractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcontractor->delete();

        return back();
    }

    public function massDestroy(MassDestroySubcontractorRequest $request)
    {
        Subcontractor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('subcontractor_create') && Gate::denies('subcontractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Subcontractor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
