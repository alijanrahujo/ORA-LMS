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
            $table->foreignId('academic_id')->constrained('academic_id,');
            $table->foreignId('user_id')->constrained('user_id,');
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