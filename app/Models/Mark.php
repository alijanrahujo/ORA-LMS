<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mark extends Model
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
        'obt',
        'marks',

    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }
    protected $table = "marks";
    public $timestamps = true;

    public function Student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
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

    public function Exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
}