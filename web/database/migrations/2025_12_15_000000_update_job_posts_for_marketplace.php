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
        Schema::table('job_posts', function (Blueprint $table) {
            // Add marketplace-specific fields
            $table->text('scope')->nullable()->after('description'); // Scope of work
            $table->decimal('rate', 10, 2)->nullable()->after('salary'); // Price/Rate for the job
            $table->string('rate_type')->default('fixed')->after('rate'); // 'fixed' or 'hourly'
            $table->integer('estimated_hours')->nullable()->after('rate_type'); // Estimated hours if hourly
            $table->string('category')->nullable()->after('estimated_hours'); // Job category (Penetration Testing, etc.)
            $table->boolean('is_active')->default(true)->after('status'); // Whether the service is active
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn(['scope', 'rate', 'rate_type', 'estimated_hours', 'category', 'is_active']);
        });
    }
};
