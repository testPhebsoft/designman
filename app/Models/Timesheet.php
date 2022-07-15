<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'timesheets';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'task_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'description',
        'approved_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function approved_user()
    {
        return $this->belongsTo(User::class, 'approved_user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
