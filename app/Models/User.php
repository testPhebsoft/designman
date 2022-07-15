<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable;
    use InteractsWithMedia;
    use HasFactory;

    public const JOB_STATUS_SELECT = [
        'Working'    => 'Working',
        'Resigned'   => 'Resigned',
        'Terminated' => 'Terminated',
    ];

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $appends = [
        'image',
        'code_membership_attachment',
    ];

    protected $dates = [
        'email_verified_at',
        'joining_date',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'department_id',
        'remember_token',
        'employee_code',
        'father_name',
        'joining_date',
        'designation',
        'date_of_birth',
        'contact_number',
        'residence_address',
        'cnic',
        'citizenship',
        'disability',
        'blood_group',
        'job_status',
        'code_membership_professional',
        'country_work_experience',
        'account_title',
        'account_num',
        'bank_name',
        'bank_branch',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function departmentHeadDepartments()
    {
        return $this->hasMany(Department::class, 'department_head_id', 'id');
    }

    public function projectHeadProjects()
    {
        return $this->hasMany(Project::class, 'project_head_id', 'id');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getJoiningDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJoiningDateAttribute($value)
    {
        $this->attributes['joining_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCodeMembershipAttachmentAttribute()
    {
        return $this->getMedia('code_membership_attachment')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
