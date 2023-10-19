<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'level',
        'status',
        'institute_id'
    ];
    use SoftDeletes;
}
