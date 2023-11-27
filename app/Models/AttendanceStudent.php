<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudent extends Model
{
    use HasFactory;
    protected $fillable =[
            'class_id',
            'student_id',
            'subject_id',
            'roll',
            'student_name',
            'email',
            'phone',
            'attendance',
            'date',
            'status',

    ];
    protected $table = "attendance_student";
    public $timestamps = true;
    public function Student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}