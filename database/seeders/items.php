<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class items extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        DB::table('items')->insert([
            [
                'item_name' => 'Trek Madone',
                'category' => 1,
                'desc' => 'High-performance road bike',
                'price' => 100000,
                'photo' => 'Trek Madone.jpg',
            ],
            // [
            //     'item_name' => 'Specialized Rockhopper',
            //     'category' => 2,
            //     'desc' => 'Good Mountain Bike',
            //     'price' => 150000,
            //     'photo' => 'Specialized Rockhopper.png',
            // ],
            // [
            //     'item_name' => 'Giant Escape',
            //     'category' => 1,
            //     'desc' => 'Comfortable hybrid bike',
            //     'price' => 120000,
            //     'photo' => 'Giant Escape.jpg',
            // ],
            // [
            //     'item_name' => 'Cannondale Synapse',
            //     'category' => 3,
            //     'desc' => 'Long-distance endurance bike',
            //     'price' => 125000,
            //     'photo' => 'Cannondale Synapse.jpg',
            // ],
            // [
            //     'item_name' => 'Santa Cruz Bronson',
            //     'category' => 1,
            //     'desc' => 'Aggressive all-mountain bike',
            //     'price' => 300000,
            //     'photo' => 'Santa Cruz Bronson.jpg',
            // ],
            // [
            //     'item_name' => 'Brompton S6L',
            //     'category' => 1,
            //     'desc' => 'Compact folding bike',
            //     'price' => 300000,
            //     'photo' => 'Brompton S6L.jpg',
            // ],
            // [
            //     'item_name' => 'Cervélo P5X',
            //     'category' => 2,
            //     'desc' => 'Aero triathlon/time trial bike',
            //     'price' => 100000,
            //     'photo' => 'Cervélo P5X.jpg',
            // ],
            // [
            //     'item_name' => 'Schwinn Stingray',
            //     'category' => 1,
            //     'desc' => 'good',
            //     'price' => 150000,
            //     'photo' => 'Schwinn Stingray.jpg',
            // ],
            // [
            //     'item_name' => 'Orbea Gain',
            //     'category' => 1,
            //     'desc' => 'Good Mountain Bike',
            //     'price' => 170000,
            //     'photo' => 'Orbea Gain.jpg',
            // ],
            // [
            //     'item_name' => 'Surly Long Haul Trucker',
            //     'category' => 1,
            //     'desc' => 'Long range',
            //     'price' => 200000,
            //     'photo' => 'Surly Long Haul Trucker.jpg',
            // ],
            ]);
    }
}
