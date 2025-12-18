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
            $table->string('calendly_event_uuid')->nullable()->unique()->after('path');
            $table->dateTime('scheduled_at')->nullable()->after('calendly_event_uuid');
            $table->integer('duration')->nullable()->after('scheduled_at');
            $table->string('event_type_name')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn([
                'calendly_event_uuid',
                'scheduled_at',
                'duration',
                'event_type_name',
            ]);
        });
    }
};
