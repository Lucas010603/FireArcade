<?php

namespace Database\Factories\sales;

use App\Models\sales\UserRole;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
        $roleId = UserRole::inRandomOrder()->first()->id;

        return [
            'role_id' => $roleId,
            'email' => $faker->email,
            'name' => $faker->name(),
            'password' => Hash::make("password"),
        ];
    }
}
