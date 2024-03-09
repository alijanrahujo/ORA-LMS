<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'year_title',
        'starting_date',
        'ending_date',
    ];
    protected $table = "academic_years";
    public $timestamps = true;
}