<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const HANDLED_AS_SELECT = [
        'Single Firm'   => 'Single Firm',
        'Joint Venture' => 'Joint Venture',
    ];

    public $table = 'projects';

    protected $appends = [
        'agreement_atachment',
    ];

    protected $dates = [
        'signing_date',
        'implementation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'client_id',
        'category_id',
        'project_code',
        'location',
        'project_nature',
        'project_scope',
        'estimated_cost',
        'estimated_duration',
        'employees_assigned',
        'project_head_id',
        'handled_as',
        'venture_firm',
        'sub_contractors',
        'signing_date',
        'implementation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function project_head()
    {
        return $this->belongsTo(User::class, 'project_head_id');
    }

    public function getSigningDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSigningDateAttribute($value)
    {
        $this->attributes['signing_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImplementationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setImplementationDateAttribute($value)
    {
        $this->attributes['implementation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAgreementAtachmentAttribute()
    {
        return $this->getMedia('agreement_atachment')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
