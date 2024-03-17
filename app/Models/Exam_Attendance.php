<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'exam_id',
        'subject_id',
        'class_id',
        'student_id',
        'section_id',
        'roll',
        'mobile',
        'attendance',

    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }
    protected $table = "exam_attendance";
    public $timestamps = true;

    public function Student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }

    public function Subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subjcet_id');
    }

    public function Exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
}