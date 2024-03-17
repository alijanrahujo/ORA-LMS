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
        Schema::create('attendance_student', function (Blueprint $table) {
            $table->id();
            $table->string('class_id');
            $table->string('student_id');
            $table->string('section_id');
            $table->string('subject_id');
            $table->string('student_name');
            $table->string('roll');
            $table->string('email');
            $table->date('date');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_student');
    }
};