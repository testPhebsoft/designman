<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use DateTime;
use App\Models\Language;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Promotion;
use App\Models\Country;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {        
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['department', 'roles', 'media'])->get();        

        foreach($users as $user){
            $user->country_work_experience = $this->getCountriesName($user->country_work_experience);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');
        
        $languages = Language::pluck('language_name', 'id');        

        $countries = Country::pluck('name', 'id');   

        return view('admin.users.create', compact('departments', 'roles','languages','countries'));
    }

    public function store(StoreUserRequest $request)
    {    
        $data = $request->all();
        $data['language_reading'] = implode(',',$request->language_reading);
        $data['language_writing'] = implode(',',$request->language_writing);
        $data['language_speaking'] = implode(',',$request->language_speaking);   

        $data['country_work_experience'] = implode(',',$data['country_work_experience']);
        
        $educations =  $data['education'];
        $employments = $data['employment'];
        $promotions = $data['promotion'];        
        unset($data['education']);
        unset($data['employment']);
        unset($data['promotion']);

        $user = User::create($data);
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }
        
        //employments
        if($employments)
        {
            foreach($employments as $employment)
            {
                $data = array(
                    "user_id" => $user->id,
                    "company_name" => $employment['company_name'],
                    "designation" => $employment['designation'],
                    "start_date" => $employment['start_date'],
                    "end_date" => $employment['end_date'],
                );
                $emp = Employment::create($data);                
            }
        }

        //promotions
        if($promotions)
        {
            foreach($promotions as $promotion)
            {
                $data = array(
                    "user_id" => $user->id,
                    "promotion_date" => $promotion['promotion_date'],
                    "designation" => $promotion['designation'],
                );
                $pro = Promotion::create($data);                
            }
        }

        //education
        if($educations)
        {
            foreach($educations as $education)
            {
                $data = array(
                    "user_id" => $user->id,
                    "degree_name" => $education['degree_name'],
                    "educational_institute" => $education['educational_institute'],
                    "degree_duration" => $education['degree_duration'],
                );
                $edu = Education::create($data);
                if(isset($education['degree_attachment']))
                {
                    $user->addMedia(storage_path('tmp/uploads/' . basename($education['degree_attachment'])))->toMediaCollection('degree_attachment');
                }
            }
        }

        if ($request->input('code_membership_attachment', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('code_membership_attachment'))))->toMediaCollection('code_membership_attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');

        $countries = Country::pluck('name', 'id');

        $selected_countries = explode(',',$user->country_work_experience);

        $languages = Language::pluck('language_name', 'id');

        $reading_languages = explode(',',$user->language_reading);
        $speaking_languages = explode(',',$user->language_speaking);
        $writing_languages = explode(',',$user->language_writing);    
        
        $educations = Education::where('user_id', $user->id)->get();     
        $promotions = Promotion::where('user_id', $user->id)->get();     
        $employments = Employment::where('user_id', $user->id)->get();

        $user->load('department', 'roles');

        return view('admin.users.edit', compact('departments', 'roles', 'user','countries','selected_countries','languages','reading_languages','speaking_languages','writing_languages','educations','employments','promotions'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();
        $data['language_reading'] = implode(',',$request->language_reading);
        $data['language_writing'] = implode(',',$request->language_writing);
        $data['language_speaking'] = implode(',',$request->language_speaking);   

        $data['country_work_experience'] = implode(',',$data['country_work_experience']);

        $educations =  $data['education'];
        $employments = $data['employment'];
        $promotions = $data['promotion'];        
        unset($data['education']);
        unset($data['employment']);
        unset($data['promotion']);

        $user->update($data);
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                if ($user->image) {
                    $user->image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }

        //employments
        if($employments)
        {
            $del = Employment::where('user_id',$user->id)->delete();
            foreach($employments as $employment)
            {
                $data = array(
                    "user_id" => $user->id,
                    "company_name" => $employment['company_name'],
                    "designation" => $employment['designation'],
                    "start_date" => $employment['start_date'],
                    "end_date" => $employment['end_date'],
                );
                $emp = Employment::create($data);                
            }
        }
        //promotions
        if($promotions)
        {
            $del = Promotion::where('user_id',$user->id)->delete();
            foreach($promotions as $promotion)
            {
                $data = array(
                    "user_id" => $user->id,
                    "promotion_date" => $promotion['promotion_date'],
                    "designation" => $promotion['designation'],
                );
                $pro = Promotion::create($data);                
            }
        }
        //education
        if($educations)
        {
            $del = Education::where('user_id',$user->id)->delete();
            foreach($educations as $education)
            {
                $data = array(
                    "user_id" => $user->id,
                    "degree_name" => $education['degree_name'],
                    "educational_institute" => $education['educational_institute'],
                    "degree_duration" => $education['degree_duration'],
                );
                $edu = Education::create($data);
                if(isset($education['degree_attachment']))
                {
                    $user->addMedia(storage_path('tmp/uploads/' . basename($education['degree_attachment'])))->toMediaCollection('degree_attachment');
                }
            }
        }

        if ($request->input('code_membership_attachment', false)) {
            if (!$user->code_membership_attachment || $request->input('code_membership_attachment') !== $user->code_membership_attachment->file_name) {
                if ($user->code_membership_attachment) {
                    $user->code_membership_attachment->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('code_membership_attachment'))))->toMediaCollection('code_membership_attachment');
            }
        } elseif ($user->code_membership_attachment) {
            $user->code_membership_attachment->delete();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');        

        $user->load('department', 'roles', 'departmentHeadDepartments', 'projectHeadProjects');

        $user->job_duration = $this->getJobDuration($user->joining_date);

        $user->language_reading = $this->getUserLaguages($user->language_reading);
        $user->language_writing = $this->getUserLaguages($user->language_writing);
        $user->language_speaking = $this->getUserLaguages($user->language_speaking);

        $educations = Education::where('user_id',$user->id)->get();
        $promotions = Promotion::where('user_id',$user->id)->get();
        $employment = Employment::where('user_id',$user->id)->get();

        $user->country_work_experience = $this->getCountriesName($user->country_work_experience);        

        return view('admin.users.show', compact('user','educations','promotions','employment'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function getJobDuration($joinig_date){
        $start_date = new DateTime($joinig_date);
        $since_start = $start_date->diff(new DateTime());
        $duration = "";
        if($since_start->y != 0)
        {
            $duration = $duration.$since_start->y.' Year(s) ';
        }
         if($since_start->m != 0)
        {
            $duration = $duration.$since_start->m.' Month(s) ';
        }
         if($since_start->d != 0)
        {
            $duration = $duration.$since_start->d.' Day(s) ';
        }        
        return $duration=="" ? "N/A" : $duration;
    }

    public function getUserLaguages($languages){
        $languages_id = explode(',',$languages);
        $temp_languages = Language::whereIn('id',$languages_id)->pluck('language_name');
        $translated_languages = '';
        foreach($temp_languages as $key=>$language)
        {
            $translated_languages .= $language;
            if(isset($temp_languages[$key+1]))
            {
                $translated_languages .= ', ';
            }
        }
        return $translated_languages;
    }

    public function getCountriesName($names){
        $countries_ids = explode(',',$names);
        $temp_countries = Country::whereIn('id',$countries_ids)->pluck('name');
        $translated_names = '';
        foreach($temp_countries as $key=>$country)
        {
            $translated_names .= $country;
            if(isset($temp_countries[$key+1]))
            {
                $translated_names .= ', ';
            }
        }
        return $translated_names;
    }
    
}
