<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'subject',
        'class_id',
        'teacher_id',
        'institute_id',
        'marks'
    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }
    public function Teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }
    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }
    public function Institute()
    {
        return $this->hasOne(Institute::class, 'id', 'institute_id');
    }
}