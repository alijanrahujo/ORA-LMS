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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('amount');
            $table->text('remarks')->nullable();
            $table->string('status')->default(0);
            $table->foreignId('class_id')->constrained('school_classes');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('fee_type_id')->constrained('fee_types');
            $table->foreignId('institute_id')->constrained('institutes');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
