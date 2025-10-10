<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SecprogUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            'user_id'           => (string) Str::uuid(),
            'username'          => 'admin',
            'email'             => 'admin@example.com',
            'password'          => Hash::make('admin123'),
            'role'              => 'admin',
            'account_status'    => 'verified',
        ]);
    }
}
