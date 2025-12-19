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
        Schema::table('requests', function (Blueprint $table) {
            $table->string('deposit_status')->default('draft');
            $table->string('stripe_checkout_session_id')->nullable();
            $table->timestamp('deposit_paid_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn([
                'deposit_status',
                'stripe_checkout_session_id',
                'deposit_paid_at',
            ]);
        });
    }
};
