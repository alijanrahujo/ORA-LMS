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
    protected $table = 'mark_distributions';
    public $timestampls = true;
}