<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Syllabus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'class_id',
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
    protected $table = "syllabus";


    public function SchoolClass() //this function is use the for
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }
}