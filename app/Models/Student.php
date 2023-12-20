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
}
