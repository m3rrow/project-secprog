<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // WARNING: cuman quary dibawah cuman buat dev (optional)
        /* drop database secprog; create database secprog */
        // DB::statement('DROP DATABASE secprog');
        // DB::statement('CREATE DATABASE IF NOT EXISTS secprog');

        // ----------------------
        // secprog.jobs
        // ----------------------
        Schema::create('secprog.jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('job_id', 64)->primary();
            $table->string('job_title', 128)->unique();
            $table->text('job_desc')->nullable();

            $table->enum('price_type', ['hour', 'day'])->default('day');
            $table->unsignedInteger('price_per_time')->nullable();

            // $table->string('file_job_banner', 255)->nullable(); // not needed (untuk sekarang gak ada fitur banner gampbar)

            $table->enum('job_status', ['available', 'booked', 'unavailable'])->default('available');

            $table->enum('category', [
                'Red Team', 'Blue Team', 'Forensic', 'Network Pentest',
                'Code Audit', 'CTF Player', 'Mobile Pentest', 'Web Application Pentest'
            ])->nullable(false);

            $table->timestamp('update_at')->useCurrent()->useCurrentOnUpdate();

            $table->string('user_id', 64)->nullable();
            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user')
                  ->onDelete('cascade');
        });
        // --- TRIGGERS ---
        // A) Keep created_timestamp immutable
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_jobs_update_ts`
BEFORE UPDATE ON `secprog`.`jobs`
FOR EACH ROW
BEGIN
    SET NEW.`update_at` = CURRENT_TIMESTAMP;
END
SQL);

        // ----------------------
        // secprog.job_order
        // ----------------------
        Schema::create('secprog.job_order', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('order_id');
            
            $table->enum('price_type', ['hour', 'day'])->default('day');
            $table->unsignedInteger('duration_amount')->nullable();

            $table->string('order_note', 255)->nullable();
            $table->enum('job_status', ['Awaiting-Payment', 'On-Progress', 'Complete', 'Canceled'])->nullable(false);
            $table->timestamp('order_at')->useCurrent()->useCurrentOnUpdate();

            $table->string('job_id', 64)->nullable();
            $table->string('recruiter_id', 64)->nullable();
            $table->string('freelancer_id', 64)->nullable();

            $table->foreign('job_id')
                  ->references('job_id')->on('secprog.jobs')
                  ->onDelete('cascade');

            // Both link to secprog.*_detail(user_id) per your SQL
            $table->foreign('recruiter_id')
                  ->references('user_id')->on('secprog.customer_detail');

            $table->foreign('freelancer_id')
                  ->references('user_id')->on('secprog.freelancer_detail');
        });

        // ----------------------
        // secprog.job_ratings
        // ----------------------
        Schema::create('secprog.job_ratings', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('rating_id');
            $table->unsignedTinyInteger('rating_score');
            $table->text('comment')->nullable();
            $table->timestamp('created_timestamp')->useCurrent();

            // Keep original column names (typo: "reviewer_*") to match your SQL
            $table->string('reviewer_id', 64)->nullable();
            $table->string('reviewer_job', 64)->nullable();

            $table->foreign('reviewer_id')
                  ->references('user_id')->on('secprog.customer_detail')
                  ->onDelete('cascade');

            $table->foreign('reviewer_job')
                  ->references('job_id')->on('secprog.jobs')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // drop trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_jobs_update_ts`');

        // drop table in reverse FK dependency order
        Schema::dropIfExists('secprog.job_ratings');
        Schema::dropIfExists('secprog.job_order');
        Schema::dropIfExists('secprog.jobs');
    }
};
