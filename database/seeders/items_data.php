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
    public function run()
    {
        DB::table('items')->insert([
            [
                'item_name' => 'Trek Madone',
                'category' => 'Road Bike',
                'desc' => 'High-performance road bike',
                'price' => 10000,
                'photo' => 'Image URL of Trek Madone',
            ],
            [
                'item_name' => 'Specialized Rockhopper',
                'category' => 'Mountain Bike',
                'desc' => 'Versatile mountain bike',
                'price' => 10000,
                'photo' => 'Image URL of Specialized Rockhopper',
            ],
            [
                'item_name' => 'Giant Escape',
                'category' => 'Hybrid Bike',
                'desc' => 'Comfortable hybrid bike',
                'price' => 10000,
                'photo' => 'Image URL of Giant Escape',
            ],
            [
                'item_name' => 'Cannondale Synapse',
                'category' => 'Endurance Bike',
                'desc' => 'Long-distance endurance bike',
                'price' => 10000,
                'photo' => 'Image URL of Cannondale Synapse',
            ],
            [
                'item_name' => 'Santa Cruz Bronson',
                'category' => 'All-Mountain Bike',
                'desc' => 'Aggressive all-mountain bike',
                'price' => 10000,
                'photo' => 'Image URL of Santa Cruz Bronson',
            ],
            [
                'item_name' => 'Brompton S6L',
                'category' => 'Folding Bike',
                'desc' => 'Compact folding bike',
                'price' => 10000,
                'photo' => 'Image URL of Brompton S6L',
            ],
            [
                'item_name' => 'Cervélo P5X',
                'category' => 'Triathlon/Time Trial Bike',
                'desc' => 'Aero triathlon/time trial bike',
                'price' => 10000,
                'photo' => 'Image URL of Cervélo P5X',
            ],
            [
                'item_name' => 'Schwinn Stingray',
                'category' => 'Cruiser Bike',
                'desc' => 'Classic cruiser bike',
                'price' => 10000,
                'photo' => 'Image URL of Schwinn Stingray',
            ],
            [
                'item_name' => 'Orbea Gain',
                'category' => 'Electric Road Bike',
                'desc' => 'Road bike with electric assist',
                'price' => 10000,
                'photo' => 'Image URL of Orbea Gain',
            ],
            [
                'item_name' => 'Surly Long Haul Trucker',
                'category' => 'Touring Bike',
                'desc' => 'Durable touring bike',
                'price' => 10000,
                'photo' => 'Image URL of Surly Long Haul Trucker',
            ],
            ]);
    }
}
