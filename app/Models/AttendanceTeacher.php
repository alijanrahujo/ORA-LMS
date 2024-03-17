<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'name',
        'email',
        'phone',
        'attendance',
        //  'attendance',
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

    protected $table = "attendanceteacher";
    public $timestamps = true;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
        // return $this->hasOne('app\teacher');
    }
}