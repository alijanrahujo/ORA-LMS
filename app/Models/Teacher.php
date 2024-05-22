<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
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
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {
            $model->user_id = Auth()->id();
            $model->institute_id = Auth()->id();
            $model->academic_year_id = Auth()->user()->academic_year_id;
        });
    }

    public function AcademicYear()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id', 'id');
    }
}
