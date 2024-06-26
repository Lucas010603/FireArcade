<?php

namespace Database\Factories\mechanic;

use App\Models\mechanic\Customer;
use App\Models\mechanic\Product;
use App\Models\mechanic\TicketStatus;
use App\Models\mechanic\TicketType;
use App\Models\mechanic\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mechanic\Ticket>
 */
class TicketFactory extends Factory
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
        $productId = Product::inRandomOrder()->first()->id;

        $userId = $rng ? User::where('role_id', 3)->inRandomOrder()->first()->id : null;
        $ticketStatusId = $rng ? TicketStatus::inRandomOrder()->whereNot("id", 1)->first()->id : 1;
        $ticketTypeId =  TicketType::inRandomOrder()->first()->id;
        $randomDateTime = $faker->dateTime;

        return [
            'type_id' => $ticketTypeId,
            'status_id' => $ticketStatusId,
            'product_id' => $productId,

            'user_id' => $userId,
            'created_at' => $randomDateTime,
            'updated_at' => Carbon::parse($randomDateTime)->addDays(random_int(0,100))->addMinutes(random_int(0,1400)),
            'description' => $faker->text(50),
            'actions' => $rng ? $faker->text(50) : null,
        ];
    }
}
