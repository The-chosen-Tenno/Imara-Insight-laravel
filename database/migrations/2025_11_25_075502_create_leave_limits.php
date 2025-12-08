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
    Schema::create('leave_limits', function (Blueprint $table) {
        $table->id();
        
        // Link to user
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Annual leave
        $table->integer('annual_balance')->default(7);
        $table->integer('annual_extra')->default(0);
        $table->enum('annual_status', ['available', 'exhausted', 'overused'])->default('available');

        // Casual leave
        $table->integer('casual_balance')->default(7);
        $table->integer('casual_extra')->default(0);
        $table->enum('casual_status', ['available', 'exhausted', 'overused'])->default('available');

        // Medical leave
        $table->integer('medical_balance')->default(7);
        $table->integer('medical_extra')->default(0);
        $table->enum('medical_status', ['available', 'exhausted', 'overused'])->default('available');

        // Half-day counts
        $table->integer('half_day_count')->default(0);
        $table->integer('annual_half_day_count')->default(0);
        $table->integer('casual_half_day_count')->default(0);
        $table->integer('medical_half_day_count')->default(0);
        
        $table->integer('total_short_leave')->default(0);
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_limits');
    }
};
