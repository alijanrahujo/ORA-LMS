<?php

namespace App\Models;

//use App\Models\Teacher;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'dob',
        'gender',
        'phone',
        'mobile',
        'date',
        'roll_number',
        'reg_number',
        'monthly_fee',
        'status',
        'status',
        'guardian_id',
        'class_id',
        'section_id',
        'academic_id'
    ];
    // public function Section()
    // {
    //     return $this->hasOne(Section::class, 'id', 'section_id');
    // }



    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {
            $model->user_id = Auth()->id();
            $model->institute_id = Auth()->id();
            $model->academic_year_id = Auth()->user()->academic_id;
        });
    }
    public function Section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }

    public function Subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
    public function Marks()
    {
        return $this->hasMany(Mark::class, 'student_id', 'id');
    }

    public function AcademicYear()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id', 'id');
    }
}