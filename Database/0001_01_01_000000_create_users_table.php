<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /* users table for authentication */
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 64)->primary();

            $table->string('username', 32);
            $table->string('email', 32);
            $table->string('password', 32); // consider widening for real password hashes (currently md5==32)

            $table->string('no_hp', 16)->nullable();
            $table->string('alamat', 128)->nullable();

            // secure timestamps (timezone-aware, default now)
            $table->timestampTz('login_timestamp')->useCurrent();
            $table->timestampTz('pass_change_timestamp')->useCurrent();

            $table->enum('role', ['admin', 'customer', 'engineer'])->default('customer');

            $table->string('job_id', 64)->nullable();
            $table->foreign('job_id')
                  ->references('job_id')->on('jobs')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            // constraints/indexes
            $table->unique('email');
            $table->unique('username');
            $table->index('login_timestamp');
            $table->index('pass_change_timestamp');
        });

        /* users table for more details */
        Schema::create('user_details', function (Blueprint $table) {
            $table->string('user_id', 64)->primary();

            $table->string('nama_lengkap', 128);
            $table->string('no_hp', 16)->nullable();
            $table->date('tgl_lahir')->nullable(); // keep as DATE per spec
            $table->string('alamat', 128)->nullable();
            $table->string('link_porto', 128)->nullable();
            $table->string('dir_profile_photo', 128)->nullable();

            // Secure edit timestamp (TZ-aware)
            $table->timestampTz('edit_change_timestamp')->useCurrent();

            // job_id as FK (optional)
            $table->string('job_id', 64)->nullable();

            // FKs
            $table->foreign('user_id')
                  ->references('user_id')->on('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete(); // delete detail when user is deleted

            $table->foreign('job_id')
                  ->references('job_id')->on('jobs')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            // Indexes
            $table->index('job_id');
            $table->index('edit_change_timestamp');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
	Schema::dropIfExists('user_details');
        Schema::enableForeignKeyConstraints();
    }
};
