<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'item_id' => 1,
                'user_id' => 1,
                'category' => 3,
                'status' => 1, // Replace with the desired status
                'payment_evidence' => 'path/to/payment/evidence.jpg',
                'start_date' => now(),
                'end_date' => now()->addDays(5), // Example: Order is for 7 days
                'price' => 10000,
                'comments' => 'butuh cepat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 1,
                'user_id' => 1,
                'category' => 2,
                'status' => 1, // Replace with the desired status
                'payment_evidence' => 'path/to/payment/evidence.jpg',
                'start_date' => now(),
                'end_date' => now()->addDays(5), // Example: Order is for 7 days
                'price' => 10000,
                'comments' => 'Hubungi',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
