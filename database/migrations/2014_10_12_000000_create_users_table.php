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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->enum('user_status', ['active', 'inactive'])->default('active');
            $table->enum('status', ['confirmed', 'declined', 'pending'])->default('pending');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
