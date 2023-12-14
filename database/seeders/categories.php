<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' =>  'Sepeda Gunung (Mountain Bike)',
            ],
            [
                'category_name' =>  'Sepeda Balap (Race Bike)',
            ],
            [
                'category_name' =>  'Sepeda Lipat (Folding Bike)',
            ],
            [
                'category_name' =>  'Sepeda Listrik (E-Bike)',
            ],
        ]);
    }
}
