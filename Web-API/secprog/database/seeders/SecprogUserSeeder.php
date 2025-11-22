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


        $userArr = [
            "dimas" => "freelancer",
            "fajar" => "customer",
            "eko" => "freelancer",
            "vera" => "customer",
            "nadia" => "freelancer"
        ];

        foreach ($userArr as $name => $role) {
            $gen_uuid = (string) Str::uuid();
            // user & user_detail
            DB::table('user')->insert([
                'user_id'           => $gen_uuid,
                'username'          => $name,
                'email'             => "{$name}@mail.com",
                'password'          => Hash::make('p@ssw0rd'),
                'role'              => $role,
                'account_status'    => 'verified',
            ]);
            DB::table("{$role}_detail")->insert([
                'user_id'           => $gen_uuid
            ]);

            // generate wallet too
            DB::table("user_wallet")->insert([
                'wallet_id'         => (string) Str::uuid(),
                'user_id'           => $gen_uuid,
                'balance'           => mt_rand(500, 1000)*1000 // generate from 500.000 to 1.000.000
            ]);
        }

        // custom add
        $gen_uuid = (string) Str::uuid();
        $role = "freelancer";
        // user & user_detail
        DB::table('user')->insert([
            'user_id'           => $gen_uuid,
            'username'          => "ncw",
            'email'             => "ncw.binus2024@gmail.com",
            'password'          => Hash::make('p@ssw0rd'),
            'role'              => $role,
            'account_status'    => 'verified',
        ]);
        DB::table("{$role}_detail")->insert([
            'user_id'           => $gen_uuid
        ]);
        // generate wallet too
        DB::table("user_wallet")->insert([
            'wallet_id'         => (string) Str::uuid(),
            'user_id'           => $gen_uuid,
            'balance'           => 1000000
        ]);

        // custom add
        $gen_uuid = (string) Str::uuid();
        $role = "customer";
        // user & user_detail
        DB::table('user')->insert([
            'user_id'           => $gen_uuid,
            'username'          => "m3rr",
            'email'             => "m3rr0w27@gmail.com",
            'password'          => Hash::make('p@ssw0rd'),
            'role'              => $role,
            'account_status'    => 'verified',
        ]);
        DB::table("{$role}_detail")->insert([
            'user_id'           => $gen_uuid
        ]);
        // generate wallet too
        DB::table("user_wallet")->insert([
            'wallet_id'         => (string) Str::uuid(),
            'user_id'           => $gen_uuid,
            'balance'           => 1000000
        ]);
    }
}
