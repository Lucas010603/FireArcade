<?php

namespace Database\Factories\sales;

use App\Models\sales\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = Faker::create('nl_NL');
        $rng = $faker->boolean();

        $customer_id = Customer::inRandomOrder()->first()->id;
        return [
            'customer_id' => $rng ? $customer_id : null,
            'name' => $faker->unique()->words(rand(1, 3), true) . " Arcade Machine",
            'serial' => $faker->numberBetween(),
            'contract_start' => $faker->dateTime,
            'contract_end' => $faker->dateTime,
            'contract' => $faker->filePath(),
            'active' => 1,
        ];
    }
}
