<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'fee_type',
        'amount',
        'remarks',
        'status',
        'institue_id',
    ];
}