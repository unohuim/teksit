<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            if (Schema::hasColumn('requests', 'path')) {
                $table->dropColumn('path');
            }
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->string('status')->default('draft');
            $table->string('audience_type')->nullable();
            $table->enum('path', ['fix_now', 'plan_properly'])->nullable();
            $table->string('calendly_event_uuid')->nullable()->unique();
            $table->timestamp('scheduled_at')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->string('event_type_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn([
                'status',
                'audience_type',
                'path',
                'calendly_event_uuid',
                'scheduled_at',
                'duration',
                'event_type_name',
            ]);

            $table->enum('path', ['fix_now', 'plan_properly']);
        });
    }
};
