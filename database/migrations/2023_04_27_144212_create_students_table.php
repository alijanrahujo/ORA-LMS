<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('guardion_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->date('date');
            $table->string('roll_number')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('monthly_fee')->nullable();
            $table->string('status')->default(1);
            $table->foreignId('guardian_id')->constrained('guardians');
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('academic_id')->constrained('academic_years');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
