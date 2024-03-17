<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'class_id',
        'section_id',
        'subject_id',
        'file',

    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }
    protected $table = "assignment";

    public function SchoolClass() //this function is use the for
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