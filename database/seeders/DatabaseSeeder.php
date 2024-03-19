<?php

namespace Database\Seeders;

use App\Models\customer\Customer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('user_role')->insert(["name" => 'beheerder']);
        DB::table('user_role')->insert(["name" => 'verkoop_medewerker']);
        DB::table('user_role')->insert(["name" => 'monteur']);

        DB::table('ticket_type')->insert(["name" => 'instalatie']);
        DB::table('ticket_type')->insert(["name" => 'reparatie']);

        DB::table('ticket_status')->insert(["name" => 'open']);
        DB::table('ticket_status')->insert(["name" => 'in_behandeling']);
        DB::table('ticket_status')->insert(["name" => 'afgerond']);

        DB::table('customer_type')->insert(["name" => 'bedrijf']);
        DB::table('customer_type')->insert(["name" => 'particulier']);

        DB::table('customer')->insert([
            'type_id' => 1,
            'full_name' => 'First_Customer',
            'country' => 'Nederland',
            'city' => 'Roermond',
            'postal_code' => '1122AB',
            'bank_account_number' => 'NL47 RABO 0159 8327 05',
            'phone_number' => '0691122211',
            'active' => 1
            ]);

        DB::table('product')->insert([
            'customer_id' => 1,
            'serial' => '1234567A',
            'contract_start' => Carbon::now(),
            'contract_end' => Carbon::now()->addDays(120),
            'contract' => 'test.pdf'
        ]);


        Customer::factory()->times(5)->create();

//        $userRoles = [
//            ['name' => 'beheerder'],
//            ['name' => 'verkoop_medewerker'],
//            ['name' => 'monteur'],
//        ];
//        $users = [
//            [
//                'name' => 'beheerder',
//                'role_id' => '2',
//                'email' => 'medewerker@test.com',
//                'password' => Hash::make("test")
//            ],
//        ];
//
//        foreach ($userRoles as $role) {
//            UserRole::create($role);
//        }
//        foreach ($users as $user) {
//            User::create($user);
//        }
    }
}
