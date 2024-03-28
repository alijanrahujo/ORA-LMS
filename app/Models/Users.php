<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'all_users';
    protected $fillable = [
        'name',
        'religion',
        'gender',
        'dob',
        'address',
        'joining_date',
        'phone',
        'email',
        'password',
        'profile_picture',
        'role_id',
        'status',
        'institue_id',
    ];
    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($model) {
            $model->institute_id = Auth()->id();
        });
    }

    public function Role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id', 'id');
    }
}
