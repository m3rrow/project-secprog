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
        $driver = DB::connection()->getDriverName();

        if ($driver !== 'sqlite') {
            if (Schema::hasTable('users') && Schema::hasColumn('users', 'birthdate')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->date('birthdate')->nullable()->change();
                });
            }
            return;
        }

        // SQLite: rebuild the users table with birthdate nullable
        if (! Schema::hasTable('users') || ! Schema::hasColumn('users', 'birthdate')) {
            return;
        }

        DB::statement('PRAGMA foreign_keys=off;');

        DB::statement(<<<'SQL'
            CREATE TABLE users_temp (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                email_verified_at DATETIME NULL,
                birthdate DATE NULL,
                password VARCHAR(255) NOT NULL,
                role VARCHAR(255) DEFAULT 'user',
                remember_token VARCHAR(100) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            );
        SQL
        );

        DB::statement(<<<'SQL'
            INSERT INTO users_temp (id, name, email, email_verified_at, birthdate, password, role, remember_token, created_at, updated_at)
            SELECT id, name, email, email_verified_at, birthdate, password, role, remember_token, created_at, updated_at FROM users;
        SQL
        );

        DB::statement('DROP TABLE users;');
        DB::statement('ALTER TABLE users_temp RENAME TO users;');
        DB::statement('PRAGMA foreign_keys=on;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $driver = DB::connection()->getDriverName();

        if ($driver !== 'sqlite') {
            if (Schema::hasTable('users') && Schema::hasColumn('users', 'birthdate')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->date('birthdate')->nullable(false)->change();
                });
            }
            return;
        }

        // SQLite: rebuild table setting birthdate NOT NULL (only if it's present)
        if (! Schema::hasTable('users') || ! Schema::hasColumn('users', 'birthdate')) {
            return;
        }

        DB::statement('PRAGMA foreign_keys=off;');

        DB::statement(<<<'SQL'
            CREATE TABLE users_temp (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                email_verified_at DATETIME NULL,
                birthdate DATE NOT NULL,
                password VARCHAR(255) NOT NULL,
                role VARCHAR(255) DEFAULT 'user',
                remember_token VARCHAR(100) NULL,
                created_at DATETIME NULL,
                updated_at DATETIME NULL
            );
        SQL
        );

        DB::statement(<<<'SQL'
            INSERT INTO users_temp (id, name, email, email_verified_at, birthdate, password, role, remember_token, created_at, updated_at)
            SELECT id, name, email, IFNULL(birthdate, '1970-01-01'), password, role, remember_token, created_at, updated_at FROM users;
        SQL
        );

        DB::statement('DROP TABLE users;');
        DB::statement('ALTER TABLE users_temp RENAME TO users;');
        DB::statement('PRAGMA foreign_keys=on;');
    }
};
