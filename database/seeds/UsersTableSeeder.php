<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            '/storage/users/avatars/s0.png',
            '/storage/users/avatars/s1.png',
            '/storage/users/avatars/s2.png',
            '/storage/users/avatars/s3.png',
            '/storage/users/avatars/s4.png',
            '/storage/users/avatars/s5.png',
            '/storage/users/avatars/s6.png',
            '/storage/users/avatars/s7.png',
            '/storage/users/avatars/s8.png',
            '/storage/users/avatars/s9.png',
            '/storage/users/avatars/s10.png',
        ];
        $faker = Faker::create();
        for ($i=1; $i <= 20; $i++) {
            App\User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('11111111'),
                'photo' => $faker->randomElement($images)
            ]);
        }
    }
}
