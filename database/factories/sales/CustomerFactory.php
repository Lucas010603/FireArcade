<?php

namespace Database\Factories\sales;

use App\Models\sales\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sales\Customer>
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

        $type_id = CustomerType::inRandomOrder()->first()->id;

        return [
            'type_id' => $type_id,
            'full_name' => $faker->name,
            'country' => $faker->country,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,
            'phone_number' => $faker->phoneNumber,
            'bank_account_number' => $faker->iban,
            'active' => 1
        ];
    }
}
