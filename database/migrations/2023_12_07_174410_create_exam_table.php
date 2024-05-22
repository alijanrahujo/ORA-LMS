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
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->date('date');
            $table->string('note');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam');
    }
};
