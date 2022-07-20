<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDisputeRequest;
use App\Http\Requests\StoreDisputeRequest;
use App\Http\Requests\UpdateDisputeRequest;
use App\Models\Dispute;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DisputeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dispute_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disputes = Dispute::with(['project', 'media'])->get();

        return view('admin.disputes.index', compact('disputes'));
    }

    public function create()
    {
        abort_if(Gate::denies('dispute_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.disputes.create', compact('projects'));
    }

    public function store(StoreDisputeRequest $request)
    {
        $dispute = Dispute::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $dispute->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dispute->id]);
        }

        return redirect()->route('admin.disputes.index');
    }

    public function edit(Dispute $dispute)
    {
        abort_if(Gate::denies('dispute_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dispute->load('project');

        return view('admin.disputes.edit', compact('dispute', 'projects'));
    }

    public function update(UpdateDisputeRequest $request, Dispute $dispute)
    {
        $dispute->update($request->all());

        if (count($dispute->documents) > 0) {
            foreach ($dispute->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dispute->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dispute->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.disputes.index');
    }

    public function show(Dispute $dispute)
    {
        abort_if(Gate::denies('dispute_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dispute->load('project');

        return view('admin.disputes.show', compact('dispute'));
    }

    public function destroy(Dispute $dispute)
    {
        abort_if(Gate::denies('dispute_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dispute->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisputeRequest $request)
    {
        Dispute::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dispute_create') && Gate::denies('dispute_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Dispute();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
