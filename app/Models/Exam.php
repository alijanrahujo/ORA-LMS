<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'date',
        'note',
        'academic_id'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){

            $model->user_id =Auth()->id();
            $model->institute_id = Auth()->id();
            $model->academic_year_id = Auth()->user()->academic_id;
        });
    }
    protected $table = "exam";
    public $timestamps = true;

    public function AcademicYear(){
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id', 'id');
    }
}