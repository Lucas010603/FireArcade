<?php

namespace Database\Factories\admin;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\User>
 */
class UserFactory extends Factory
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
            'role_id' => rand(1, 3),
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password
        ];
    }
}
