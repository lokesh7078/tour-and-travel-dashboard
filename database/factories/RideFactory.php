<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    public function definition(): array
    {
        $indianNames = [
            'Amit Sharma','Rohit Kumar','Suresh Yadav','Vikas Singh',
            'Pooja Verma','Neha Gupta','Anjali Mehta','Rahul Chauhan',
            'Deepak Kumar','Manish Pandey','Shivam Tiwari','Priya Sharma','kapil kala',
            'raja'
        ];

        return [
            'rider_name'     => fake()->randomElement($indianNames),
            'phone'          => '9'.fake()->numerify('#########'),
            'driver_name'    => fake()->randomElement($indianNames),
            'payment_method' => fake()->randomElement(['Cash','Online']),
            'payment_status' => fake()->randomElement(['pending','paid']),
            'status'         => fake()->randomElement(['pending','completed','cancelled']),
            'created_at'     => fake()->dateTimeBetween('-15 days', 'now'),
            'updated_at'     => now(),
        ];
    }
}
