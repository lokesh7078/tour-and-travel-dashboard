<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ride;

class RideSeeder extends Seeder
{
    public function run(): void
    {
        Ride::truncate(); // testing ke liye clean

        Ride::factory()->count(1000)->create();
    }
}
