<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::with(['client', 'category', 'project_head', 'media'])->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProjectCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_heads = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('categories', 'clients', 'project_heads'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($request->input('agreement_atachment', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_atachment'))))->toMediaCollection('agreement_atachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProjectCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_heads = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('client', 'category', 'project_head');

        return view('admin.projects.edit', compact('categories', 'clients', 'project', 'project_heads'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->input('agreement_atachment', false)) {
            if (!$project->agreement_atachment || $request->input('agreement_atachment') !== $project->agreement_atachment->file_name) {
                if ($project->agreement_atachment) {
                    $project->agreement_atachment->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_atachment'))))->toMediaCollection('agreement_atachment');
            }
        } elseif ($project->agreement_atachment) {
            $project->agreement_atachment->delete();
        }

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('client', 'category', 'project_head');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
