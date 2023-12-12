<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => '0',
                'name' => 'Goku',
                'nohp' => '0812367412',
                'email' => 'goku@mail.com',
                'photo' => 'sepeda lipat kuat',
                'password' => '21',
            ],
            [
                'role' => '1',
                'name' => 'Budi',
                'nohp' => '0812367412',
                'email' => 'budi@mail.com',
                'photo' => 'sepeda lipat kuat',
                'password' => '21',
            ],
            ]);
    }
}
