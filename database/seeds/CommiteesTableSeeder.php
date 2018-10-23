<?php

use App\Commitee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CommiteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Commitee::create([
            'event_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
