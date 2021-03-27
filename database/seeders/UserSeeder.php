<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@mail.com', 'role' => 0, 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'geza', 'email' => 'geza@mail.com', 'role' => 1, 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'feco', 'email' => 'feco@mail.com', 'role' => 1, 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'katika', 'email' => 'katika@mail.com', 'role' => 1, 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
