<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'date',
        'amount',
        'remarks',
        'status',
        'class_id',
        'section_id',
        'student_id',
        'fee_type_id',
        'institue_id',
    ];

    public function SchoolClass()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }

    public function Section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }
    public function FeeType()
    {
        return $this->hasOne(FeeType::class, 'id', 'fee_type_id');
    }
    public function Student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}