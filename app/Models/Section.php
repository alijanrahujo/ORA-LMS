<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'capacity',
        'category',
        'status',
        'teacher_id',
        'class_id'
    ];

    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db  
        static::creating(function ($model) {
            $model->institute_id = Auth()->id();
        });
    }
    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class,'id','class_id');
    }
}
