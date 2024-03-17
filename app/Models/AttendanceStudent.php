<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'student_id',
        'roll',
        'student_name',
        'email',
        'phone',
        'attendance',
        'date',
        'status',

    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }

    protected $table = "attendance_student";
    public $timestamps = true;

    public function Student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }

    public function Section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }
}