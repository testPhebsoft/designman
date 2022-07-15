<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Document extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'documents';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'timesheet_id',
        'uploaded_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class, 'timesheet_id');
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }

    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'uploaded_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
