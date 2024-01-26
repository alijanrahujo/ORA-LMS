<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(Subject::class, 'id', 'subjcet_id');
    }

    public function Exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
}