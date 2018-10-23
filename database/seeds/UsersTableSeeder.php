<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 20; $i++) { 
            User::create([
                'email' => $faker->email,
                'password' => Hash::make('11111111'),
                'first_name' => $faker->firstName,
                'last_name' => $faker->LastName,
                'photo' => 'default.png',
                'phone' => '11111111',
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
