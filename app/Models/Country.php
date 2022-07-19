<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = 'countries';

    protected $fillable = [
        'iso',
        'name',
        'nicename',        
        'iso3',
        'numcode',
        'phonecode'
    ];

}