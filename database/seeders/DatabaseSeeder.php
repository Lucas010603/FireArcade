<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserRole;
use Database\Factories\CustomerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('customer_type')->insert(['name' => 'Bedrijf']);
        DB::table('customer_type')->insert(['name' => 'Particulier']);


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
