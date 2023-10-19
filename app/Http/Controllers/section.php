<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class section extends Controller
{
    protected $fillable=[
        'name',
        'capacity',
        'category',
        'status',
        'teacher_id',
        'class_id'
    ];

    public static function boot() {
        parent::boot();
    
        //while creating/inserting item into db  
        static::creating(function ($model) {
            $model->user_id = Auth()->id();
            $model->institute_id = Auth()->id();
        });
    
        
    }
}
