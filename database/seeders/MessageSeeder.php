<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            ['name' => 'Géza bá', 'email' => 'geza@mail.com', 'message' => 'Ez egy nagyon hasznos oldal...', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mézga Aladár', 'email' => 'aladar@mail.com', 'message' => 'Kriszta tiszta gyagya, mert...', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maci Laci', 'email' => 'maci@mail.com', 'message' => 'Ez egy hosszabb üzenet lesz, amit az oldal üzemeltetőinek akarok küldeni!', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
