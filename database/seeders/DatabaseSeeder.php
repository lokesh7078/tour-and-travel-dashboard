<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RideSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RideSeeder::class,
        ]);
    }
}
