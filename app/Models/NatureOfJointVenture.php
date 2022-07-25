<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureOfJointVenture extends Model
{
    public $table = 'nature_of_joint_ventures';

    protected $fillable = [
        'project_id',
        'venture_id',
        'nature',        
    ];
}