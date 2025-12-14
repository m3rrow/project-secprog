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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'cv')) {
                $table->string('cv')->nullable()->after('profile_picture');
            }
            if (!Schema::hasColumn('users', 'portfolio')) {
                $table->string('portfolio')->nullable()->after('cv');
            }
            if (!Schema::hasColumn('users', 'government_id')) {
                $table->string('government_id')->nullable()->after('portfolio');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cv', 'portfolio', 'government_id']);
        });
    }
};
