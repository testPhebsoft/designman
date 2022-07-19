<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    public $table = 'employment_records';

    protected $fillable = [
        'user_id',
        'company_name',
        'designation',        
        'start_date',
        'end_date'
    ];

}