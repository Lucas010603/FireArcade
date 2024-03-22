<?php

namespace Database\Factories\admin;

use App\Models\customer\Customer;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\Product>
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

        $customerIds = Customer::inRandomOrder()->first()->id;

        return [
            'name' => $faker->unique()->words(rand(1, 3), true) . " Arcade Machine",
            'customer_id' => $rng ? $customerIds : null,
            'serial' => $faker->randomNumber(7),
            'contract_start' => Carbon::now(),
            'contract_end' => Carbon::now()->addDays(120),
            'contract' => $faker->unique()->words(1, true) . ".pdf"
        ];
    }
}
