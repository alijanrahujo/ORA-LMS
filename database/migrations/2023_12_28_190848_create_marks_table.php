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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('roll');
            $table->string('mobile');
            $table->integer('obt')->unsigned(); // Change to integer or decimal based on your requirements
            $table->integer('marks')->unsigned(); // Change to integer or decimal based on your requirements
            $table->foreignId('exam_id')->constrained('exam');
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};