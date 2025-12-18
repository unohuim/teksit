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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
    
            // Contact info (marketing + ops)
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
    
            // Step 1: request context
            $table->string('audience_type')->nullable(); // Individual | Professional | Small Team
            $table->string('service_category')->nullable();
            $table->string('service_name')->nullable();
            $table->text('description')->nullable();
    
            // Lifecycle
            $table->string('status')->default('draft'); // draft | submitted | booked | completed
            $table->string('path')->nullable(); // fix_now | plan_properly
    
            // Calendly
            $table->string('calendly_event_uuid')->nullable();
            $table->timestamp('scheduled_at')->nullable();
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
