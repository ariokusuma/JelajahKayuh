<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class items_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('items_data')->insert([
            [
                'item_name' => 'Vario',
                'category' => 'Lipat',
                'desc' => 'sepeda lipat kuat',
            ],
            [
                'item_name' => 'Vario',
                'category' => 'Lipat',
                'desc' => 'sepeda lipat kuat',
            ],
            ]);
    }
}
