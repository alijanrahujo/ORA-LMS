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
        Schema::create('all_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('religion');
            $table->string('gender');
            $table->string('dob');
            $table->string('address');
            $table->string('joining_date');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('profile_picture');
            $table->foreignId('role_id')->constrained('roles');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('all_users');
    }
};