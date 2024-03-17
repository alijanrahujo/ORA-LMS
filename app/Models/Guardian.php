<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'name',
        'address',
        'city',
        'phone',
        'mobile',
        'status'
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