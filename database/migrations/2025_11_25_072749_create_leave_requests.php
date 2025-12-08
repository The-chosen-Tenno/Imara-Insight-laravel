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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('reason_type', ['annual', 'casual', 'medical'])->default('casual');
            $table->string('leave_note')->nullable();
            $table->enum('leave_duration', ['full', 'half', 'multi', 'short'])->default('full');
            $table->enum('half_day', ['first', 'second'])->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['approved', 'denied', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
