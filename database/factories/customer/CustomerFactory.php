<?php

namespace Database\Factories\customer;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('nl_NL');
        return [
            'full_name' => $faker->name,
            'type_id' => rand(1, 2),
            'country' => $faker->country,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'phone_number' => $faker->phoneNumber,
            'bank_account_number' => $faker->iban,
            'active' => 1
        ];
    }
}
