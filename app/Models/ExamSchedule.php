<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'class_id',
        'section_id',
        'subject_id',
        'date',
        'time_from',
        'time_to',
        'room',
    ];
    protected $table = "exam_schedule";
    public $timestamps = true;

    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }

    public function Section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function Subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}