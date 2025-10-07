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
        // secprog.user
        // ----------------------
        Schema::create('secprog.user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('user_id', 64)->primary();
            $table->string('username', 32)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255);

            /* timestamp implementation */
            // set to current time, never change
            $table->timestamp('created_timestamp')->useCurrent();
            // change on login
            $table->timestamp('login_timestamp')->nullable();
            // auto when password changes
            $table->timestamp('pass_change_timestamp')->nullable();

            $table->enum('role', ['admin', 'customer', 'freelancer'])->nullable(false);
        });
        // --- TRIGGERS ---
        // A) Keep created_timestamp immutable
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_user_preserve_created_ts`
BEFORE UPDATE ON `secprog`.`user`
FOR EACH ROW
BEGIN
    SET NEW.`created_timestamp` = OLD.`created_timestamp`;
END
SQL);
        // B) Auto-set pass_change_timestamp when password actually changes
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_user_password_changed`
BEFORE UPDATE ON `secprog`.`user`
FOR EACH ROW
BEGIN
    IF (NEW.`password` <> OLD.`password`) THEN
        SET NEW.`pass_change_timestamp` = CURRENT_TIMESTAMP;
    END IF;
END
SQL);
        // C) Auto-set user.user_id == user_detail.user_id
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_user_after_insert`
AFTER INSERT ON `secprog`.`user`
FOR EACH ROW
BEGIN
  INSERT INTO `secprog`.`user_detail` (`user_id`) VALUES (NEW.`user_id`);
END;
SQL);

        // ----------------------
        // secprog.user_detail
        // ----------------------
        Schema::create('secprog.user_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('user_id', 64)->primary();

            $table->string('nama_lengkap', 255)->nullable();
            $table->string('no_hp', 16)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('link_porto', 255)->nullable();
            $table->string('link_profile_photo', 255)->nullable();

            $table->timestamp('edit_change_timestamp')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('verified_status')->default(false);

            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user')
                  ->onDelete('cascade');
        });

        // ----------------------
        // secprog.user_wallet
        // ----------------------
        Schema::create('secprog.user_wallet', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('wallet_id', 64)->primary();
            $table->decimal('balance', 15, 2)->default(0.00);

            $table->string('user_id', 64)->unique();

            // Note: FK points to user_detail(user_id), as in your SQL
            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user_detail')
                  ->onDelete('cascade');
        });

        // ----------------------
        // secprog.jobs
        // ----------------------
        Schema::create('secprog.jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('job_id', 64)->primary();
            $table->string('name', 128)->nullable();
            $table->text('job_desc')->nullable();
            $table->string('link_job_photo', 255)->nullable();
            $table->decimal('price_per_hour', 15, 2)->default(0.00);
            $table->date('hire_time')->nullable();

            $table->enum('category', [
                'Red Team', 'Blue Team', 'Forensic', 'Pentester',
                'Code Audit', 'CTF Player', 'Recruiter'
            ])->nullable(false);

            $table->string('user_id', 64)->nullable();
            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user_detail')
                  ->onDelete('cascade');
        });

        // ----------------------
        // secprog.job_order
        // ----------------------
        Schema::create('secprog.job_order', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('order_id');

            $table->unsignedInteger('duration_hours')->nullable();
            $table->string('order_note', 255)->nullable();
            $table->enum('job_status', ['On Progress', 'Complete', 'Waiting Order'])->nullable(false);

            $table->string('job_id', 64)->nullable();
            $table->string('recruiter_id', 64)->nullable();
            $table->string('freelancer_id', 64)->nullable();

            $table->foreign('job_id')
                  ->references('job_id')->on('secprog.jobs')
                  ->onDelete('cascade');

            // Both link to secprog.user(user_id) per your SQL
            $table->foreign('recruiter_id')
                  ->references('user_id')->on('secprog.user');

            $table->foreign('freelancer_id')
                  ->references('user_id')->on('secprog.user');
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

            // Keep original column names (typo: "reviwer_*") to match your SQL
            $table->string('reviwer_id', 64)->nullable();
            $table->string('reviwer_job', 64)->nullable();

            $table->foreign('reviwer_id')
                  ->references('user_id')->on('secprog.user_detail')
                  ->onDelete('cascade');

            $table->foreign('reviwer_job')
                  ->references('job_id')->on('secprog.jobs')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // drop trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_preserve_created_ts`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_password_changed`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_after_insert`');

        // drop table in reverse FK dependency order
        Schema::dropIfExists('secprog.job_ratings');
        Schema::dropIfExists('secprog.job_order');
        Schema::dropIfExists('secprog.jobs');
        Schema::dropIfExists('secprog.user_wallet');
        Schema::dropIfExists('secprog.user_detail');
        Schema::dropIfExists('secprog.user');
    }
};
