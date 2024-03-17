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
        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('deadline');
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId("subject_id")->constrained('subjects');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->string('file');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment');
    }
};