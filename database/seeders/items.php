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
                'category' => 'Road Bike',
                'desc' => 'High-performance road bike',
                'price' => 100000,
                'photo' => 'Trek Madone.jpg',
            ],
            [
                'item_name' => 'Specialized Rockhopper',
                'category' => 'Mountain Bike',
                'desc' => 'Versatile mountain bike',
                'price' => 150000,
                'photo' => 'Specialized Rockhopper.png',
            ],
            [
                'item_name' => 'Giant Escape',
                'category' => 'Hybrid Bike',
                'desc' => 'Comfortable hybrid bike',
                'price' => 120000,
                'photo' => 'Giant Escape.jpg',
            ],
            [
                'item_name' => 'Cannondale Synapse',
                'category' => 'Endurance Bike',
                'desc' => 'Long-distance endurance bike',
                'price' => 125000,
                'photo' => 'Cannondale Synapse.jpg',
            ],
            [
                'item_name' => 'Santa Cruz Bronson',
                'category' => 'All-Mountain Bike',
                'desc' => 'Aggressive all-mountain bike',
                'price' => 300000,
                'photo' => 'Santa Cruz Bronson.jpg',
            ],
            [
                'item_name' => 'Brompton S6L',
                'category' => 'Folding Bike',
                'desc' => 'Compact folding bike',
                'price' => 300000,
                'photo' => 'Brompton S6L.jpg',
            ],
            [
                'item_name' => 'Cervélo P5X',
                'category' => 'Triathlon/Time Trial Bike',
                'desc' => 'Aero triathlon/time trial bike',
                'price' => 100000,
                'photo' => 'Cervélo P5X.jpg',
            ],
            [
                'item_name' => 'Schwinn Stingray',
                'category' => 'Cruiser Bike',
                'desc' => 'Classic cruiser bike',
                'price' => 150000,
                'photo' => 'Schwinn Stingray.jpg',
            ],
            [
                'item_name' => 'Orbea Gain',
                'category' => 'Electric Road Bike',
                'desc' => 'Road bike with electric assist',
                'price' => 170000,
                'photo' => 'Orbea Gain.jpg',
            ],
            [
                'item_name' => 'Surly Long Haul Trucker',
                'category' => 'Touring Bike',
                'desc' => 'Durable touring bike',
                'price' => 200000,
                'photo' => 'Surly Long Haul Trucker.jpg',
            ],
            ]);
    }
}
