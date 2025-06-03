<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')->insert([
            [
                'name' => 'Basic Plan',
                'price' => 100.00,
                'swap_fee' => false,
                'pairs' => 50,
                'leverage' => '1:100',
                'spread' => '1.2 pips',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard Plan',
                'price' => 250.00,
                'swap_fee' => true,
                'pairs' => 76,
                'leverage' => '1:200',
                'spread' => '0.9 pips',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Plan',
                'price' => 500.00,
                'swap_fee' => true,
                'pairs' => 100,
                'leverage' => '1:500',
                'spread' => '0.5 pips',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
