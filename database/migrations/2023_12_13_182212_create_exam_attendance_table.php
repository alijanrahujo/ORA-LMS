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
        Schema::create('exam_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exam');
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('section_id')->constrained('sections');
            $table->string('student_name');
            $table->string('roll');
            $table->string('mobile');
            $table->string('attendance');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_attendance');
    }
};
