<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $table = 'promotions';

    protected $fillable = [
        'user_id',
        'promotion_date',
        'designation',                
    ];

}