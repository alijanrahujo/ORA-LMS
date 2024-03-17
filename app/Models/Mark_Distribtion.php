<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark_Distribtion extends Model
{
    use HasFactory;
    protected $fillable =[
        'mark_distribtion',
        'mark_value',
    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {

            $model->institute_id = Auth()->id();
        });
    }
    protected $table = 'mark_distributions';
    public $timestampls = true;
}