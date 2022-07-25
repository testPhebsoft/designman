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
use App\Models\JointVentureFirm;
use App\Models\Subcontractor;
use App\Models\Role;
use DB;
use App\Models\NatureOfJointVenture;

class ProjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::with(['client', 'category', 'project_head', 'media'])->get();

        foreach($projects as $project){
            $project = $this->ExtractMultipleFieldsData($project);            
        }       

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');        

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProjectCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_heads = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');        

        $venture_firms = JointVentureFirm::pluck('firm_name', 'id');        

        $subcontractors = Subcontractor::pluck('name', 'id');  

        $emp_role_id = Role::where('title','LIKE','%ad%')->pluck('id')->first();
        $employees = array();
        if($emp_role_id)
        {
            $emp_ids = DB::table('role_user')->where('role_id', $emp_role_id)->pluck('user_id');            
            if($emp_ids)
            {
                $employees = User::whereIn('id',$emp_ids)->pluck('name', 'id');
            }            
        }               

        return view('admin.projects.create', compact('categories', 'clients', 'project_heads','venture_firms','subcontractors','employees'));
    }

    public function store(StoreProjectRequest $request)
    {         
        $data = $request->except('sub_contractors','employees_assigned','venture_firm','nature_of_joint_venture');        
        
        $data['sub_contractors'] = implode(',',$request->sub_contractors);
        $data['employees_assigned'] = implode(',',$request->employees_assigned);
        $data['venture_firm'] = implode(',',$request->venture_firm);

        $nature_of_joint_venture = $request->nature_of_joint_venture;
        
        $project = Project::create($data);

        if ($request->input('agreement_atachment', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('agreement_atachment'))))->toMediaCollection('agreement_atachment');
        }

        if($nature_of_joint_venture)
        {
            foreach($nature_of_joint_venture as $ven)
            {   
                $arr = array(
                    "project_id" => $project->id,
                    "venture_id" => $ven['venture_id'],
                    "nature" => $ven['nature'],
                );
                $joint_ven = NatureOfJointVenture::create($arr);
            }
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

        $ventures = NatureOfJointVenture::where('project_id',$project->id)->get();

        $project->venture_firm = explode(',',$project->venture_firm);              

        $project->employees_assigned = explode(',',$project->employees_assigned);           

        $venture_firms = JointVentureFirm::pluck('firm_name','id');
        $md_class = 'col-md-12';
        if(count($ventures) == 2)
        {
            $md_class = 'col-md-6';
        }
        else if(count($ventures) == 3){
            $md_class = 'col-md-4';
        }
        
        $emp_role_id = Role::where('title','LIKE','%ad%')->pluck('id')->first();
        $employees = array();
        if($emp_role_id)
        {
            $emp_ids = DB::table('role_user')->where('role_id', $emp_role_id)->pluck('user_id');            
            if($emp_ids)
            {
                $employees = User::whereIn('id',$emp_ids)->pluck('name', 'id');
            }            
        }  

        $project->sub_contractors = explode(',',$project->sub_contractors); 
        
        $subcontractors = Subcontractor::pluck('name','id');

        $project->load('client', 'category', 'project_head');

        $users = User::pluck('name','id');

        return view('admin.projects.edit', compact('categories', 'clients', 'project', 'project_heads','ventures','md_class','venture_firms','subcontractors','employees'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->except('sub_contractors','employees_assigned','venture_firm','nature_of_joint_venture');        
        
        $data['sub_contractors'] = implode(',',$request->sub_contractors);
        $data['employees_assigned'] = implode(',',$request->employees_assigned);
        $data['venture_firm'] = implode(',',$request->venture_firm);

        $nature_of_joint_venture = $request->nature_of_joint_venture;

        $project->update($data);

        if($nature_of_joint_venture)
        {
            foreach($nature_of_joint_venture as $ven)
            {   
                $arr = array(
                    "project_id" => $project->id,
                    "venture_id" => $ven['venture_id'],
                    "nature" => $ven['nature'],
                );
                $joint_ven = NatureOfJointVenture::create($arr);
            }
        }

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

        $project = $this->ExtractMultipleFieldsData($project);

        $project->load('client', 'category', 'project_head');

        $ventures = NatureOfJointVenture::where('project_id',$project->id)->get();
        foreach($ventures as $venture)
        {
            $joint_venture = JointVentureFirm::find($venture->venture_id);
            $venture->firm_name = $joint_venture->firm_name;
            $venture->code = $joint_venture->code;
        }
        
        return view('admin.projects.show', compact('project','ventures'));
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

    //this is used to get subcordinators, assigned users, venture firms names 
    public function ExtractMultipleFieldsData($project){
        $venture_firm_ids = explode(',',$project->venture_firm);
        $sub_contractors_ids = explode(',',$project->sub_contractors);
        $employees_assigned_ids = explode(',',$project->employees_assigned);     
        
        $venture_firms = JointVentureFirm::whereIn('id',$venture_firm_ids)->pluck('firm_name');
        $project->venture_firm = '';
        foreach($venture_firms as $key=>$venture_firm){
            $project->venture_firm .= $venture_firm; 
            if(isset($venture_firms[$key+1]))
            {
                $project->venture_firm .= ', ';
            }    
        }

        $sub_contractors = Subcontractor::whereIn('id',$sub_contractors_ids)->pluck('name');
        $project->sub_contractors = '';
        foreach($sub_contractors as $key=>$sub_contractor){
            $project->sub_contractors .= $sub_contractor;
            if(isset($sub_contractors[$key+1]))
            {
                $project->sub_contractors .= ', ';
            }
        }

        $employees_assigned = User::whereIn('id',$employees_assigned_ids)->pluck('name');
        $project->employees_assigned = '';
        foreach($employees_assigned as $key=>$employee){
            $project->employees_assigned .= $employee;
            if(isset($employees_assigned[$key+1]))
            {
                $project->employees_assigned .= ', ';
            }
        }
        return $project;
    }//end of ExtractMultipleFieldsData
}
