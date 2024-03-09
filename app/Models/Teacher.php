<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'education',
        'gender',
        'dob',
        'address',
        'city',
        'phone',
        'mobile',
        'email',
        'status',
        'institue_id',
        'user_id',
        'academic_year_id'
    ];
}