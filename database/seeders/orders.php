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
                'payment_evidence' => 'path/to/payment/evidence.jpg',
                'status' => 1, // Replace with the desired status
                'start_date' => now(),
                'end_date' => now()->addDays(5), // Example: Order is for 7 days
                'comments' => 'This is a sample order comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_id' => 4,
                'user_id' => 2,
                'payment_evidence' => 'path/to/payment/evidence.jpg',
                'status' => 5, // Replace with the desired status
                'start_date' => now(),
                'end_date' => now()->addDays(3), // Example: Order is for 7 days
                'comments' => 'This is a sample order comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
