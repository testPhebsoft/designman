<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public $table = 'educations';

    protected $fillable = [
        'user_id',
        'degree_name',
        'educational_institute',        
        'degree_duration'
    ];

}