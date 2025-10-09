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
            $table->timestamp('last_modified_at')->nullable();

            $table->enum('role', ['admin', 'customer', 'freelancer'])->nullable(false);
            $table->boolean('account_status')->default(false);
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
        // B) Auto-set last_modified_at when email or password actually changes
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_user_last_modified_at`
BEFORE UPDATE ON `secprog`.`user`
FOR EACH ROW
BEGIN
    IF (
        NOT (NEW.`email`        <> OLD.`email`) OR
        NOT (NEW.`password`     <> OLD.`password`)
    ) THEN
        SET NEW.`last_modified_at` = CURRENT_TIMESTAMP;
    END IF;
END
SQL);
        // C) Auto-set user.user_id == user_detail.user_id
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_user_after_update_role`
AFTER UPDATE ON `secprog`.`user`
FOR EACH ROW
BEGIN
    IF NEW.`role` <> OLD.`role` THEN
        IF NEW.`role` = 'customer' THEN
            INSERT IGNORE INTO `secprog`.`customer_detail` (`user_id`) VALUES (NEW.`user_id`);
            -- Optional: DELETE FROM freelancer_detail WHERE user_id = NEW.user_id;
        ELSEIF NEW.`role` = 'freelancer' THEN
            INSERT IGNORE INTO `secprog`.`freelancer_detail` (`user_id`) VALUES (NEW.`user_id`);
            -- Optional: DELETE FROM cust_detail WHERE user_id = NEW.user_id;
        END IF;
    END IF;
END;
SQL);
 

        // ----------------------
        // secprog.freelancer_detail
        // ----------------------
        Schema::create('secprog.freelancer_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('user_id', 64)->primary();

            $table->string('nama_lengkap', 255)->nullable();
            $table->string('no_hp', 16)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('profile_photo', 255)->nullable();

            /* PII */
            $table->string('file_cv', 255)->nullable();
            $table->string('file_portofolio', 255)->nullable();
            $table->string('file_ktp', 255)->nullable();

            /* timestamp & status */
            $table->timestamp('last_modified_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user')
                  ->onDelete('cascade');
        });
        // --- TRIGGERS ---
        // update last_modified_at if any of the column is changed
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_freelancer_detail_modified_ts`
BEFORE UPDATE ON `secprog`.`freelancer_detail`
FOR EACH ROW
BEGIN
    IF (
        NOT (NEW.`nama_lengkap`         <=> OLD.`nama_lengkap`) OR
        NOT (NEW.`no_hp`                <=> OLD.`no_hp`) OR
        NOT (NEW.`tgl_lahir`            <=> OLD.`tgl_lahir`) OR
        NOT (NEW.`alamat`               <=> OLD.`alamat`) OR
        NOT (NEW.`profile_photo`        <=> OLD.`profile_photo`) OR
        
        NOT (NEW.`file_cv`              <=> OLD.`file_cv`) OR
        NOT (NEW.`file_portofolio`      <=> OLD.`file_portofolio`) OR
        NOT (NEW.`file_ktp`             <=> OLD.`file_ktp`)
    ) THEN
        SET NEW.`last_modified_at` = CURRENT_TIMESTAMP;
    END IF;
END
SQL);    

        // ----------------------
        // secprog.customer_detail
        // ----------------------
        Schema::create('secprog.customer_detail', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('user_id', 64)->primary();

            $table->string('nama_lengkap', 255)->nullable();
            $table->string('no_hp', 16)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('profile_photo', 255)->nullable();

            /* PII */
            $table->string('company_name', 255)->nullable();

            /* timestamp & status */
            $table->timestamp('last_modified_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user')
                  ->onDelete('cascade');
        });
        // --- TRIGGERS ---
        // update last_modified_at if any of the column is changed
        DB::unprepared(<<<'SQL'
CREATE TRIGGER `secprog_customer_detail_modified_ts`
BEFORE UPDATE ON `secprog`.`customer_detail`
FOR EACH ROW
BEGIN
    IF (
        NOT (NEW.`nama_lengkap`         <=> OLD.`nama_lengkap`) OR
        NOT (NEW.`no_hp`                <=> OLD.`no_hp`) OR
        NOT (NEW.`tgl_lahir`            <=> OLD.`tgl_lahir`) OR
        NOT (NEW.`alamat`               <=> OLD.`alamat`) OR
        NOT (NEW.`profile_photo`        <=> OLD.`profile_photo`) OR
        
        NOT (NEW.`company_name`         <=> OLD.`company_name`)
    ) THEN
        SET NEW.`last_modified_at` = CURRENT_TIMESTAMP;
    END IF;
END
SQL);


        // ----------------------
        // secprog.user_wallet
        // ----------------------
        Schema::create('secprog.user_wallet', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('wallet_id', 64)->primary();
            $table->decimal('balance', 15, 2)->default(0.00);

            $table->string('user_id', 64)->unique();

            // Note: FK points to secprog.user(user_id), as in your SQL
            $table->foreign('user_id')
                  ->references('user_id')->on('secprog.user')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // drop trigger
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_preserve_created_ts`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_last_modified_at`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_user_after_insert`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_customer_detail_modified_ts`');
        DB::unprepared('DROP TRIGGER IF EXISTS `secprog_freelancer_detail_modified_ts`');

        // drop table in reverse FK dependency order
        Schema::dropIfExists('secprog.user_wallet');
        Schema::dropIfExists('secprog.freelancer_detail');
        Schema::dropIfExists('secprog.customer_detail');
        Schema::dropIfExists('secprog.user');
    }
};
