<?php

namespace Database\Seeders;

use App\Models\mechanic\Customer;
use App\Models\mechanic\Product;
use App\Models\mechanic\Ticket;
use App\Models\mechanic\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_role')->insert(["name" => 'beheerder']);
        DB::table('user_role')->insert(["name" => 'verkoop medewerker']);
        DB::table('user_role')->insert(["name" => 'monteur']);

        DB::table('ticket_type')->insert(["name" => 'instalatie']);
        DB::table('ticket_type')->insert(["name" => 'reparatie']);


        DB::table('ticket_status')->insert(["name" => 'open']);
        DB::table('ticket_status')->insert(["name" => 'in behandeling']);
        DB::table('ticket_status')->insert(["name" => 'afgerond']);
        DB::table('ticket_status')->insert(["name" => 'geannuleerd']);

        DB::table('customer_type')->insert(["name" => 'bedrijf']);
        DB::table('customer_type')->insert(["name" => 'particulier']);


        DB::table('user')->insert([
            'name' => 'beheerder',
            'role_id' => '2',
            'email' => 'medewerker@test.com',
            'password' => Hash::make("test")
        ]);
        User::factory()->times(10)->create();
        Customer::factory()->times(10)->create();
        Product::factory()->times(10)->create();
        Ticket::factory()->times(10)->create();
    }
}