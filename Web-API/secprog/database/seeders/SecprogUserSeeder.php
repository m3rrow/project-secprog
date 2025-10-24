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


        foreach (["dimas", "fajar", "eko", "vera", "nadia"] as $name) {
            $uuid_freelancer = (string) Str::uuid();
            DB::table('user')->insert([
                'user_id'           => $uuid_freelancer,
                'username'          => $name,
                'email'             => "{$name}@mail.com",
                'password'          => Hash::make('p@ssw0rd'),
                'role'              => 'freelancer',
                'account_status'    => 'verified',
            ]);
            DB::table('freelancer_detail')->insert([
                'user_id'           => $uuid_freelancer
            ]);
        }
    }
}
