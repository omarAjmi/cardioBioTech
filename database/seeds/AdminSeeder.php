<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
                'email' => 'admin@admin.com',
                'password' => Hash::make('11111111'),
                'first_name' => 'admin',
                'last_name' => 'admin',
                'photo' => '/users/avatars/default.png',
                'phone' => '11111111',
                'admin' => '1',
                'address' => 'rue des rue en face du rue',
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
