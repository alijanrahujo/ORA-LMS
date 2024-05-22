<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institute extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'owner_name',
        'cnic',
        'designation',
        'address',
        'city',
        'phone',
        'phone2',
        'sector',
        'type',
        'status',
        'academic_year_id'
    ];

    public function AcademicYear()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
