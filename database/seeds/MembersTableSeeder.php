<?php

use App\Member;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i <= 20; $i++) { 
            Member::create([
                'commitee_id' => 1,
                'user_id' => $faker->numberBetween($min=2,$max=19),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
