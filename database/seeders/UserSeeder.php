<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, $num_utenti = 2)
    {
        // $newUser = new User();
        // $newUser->name = "admin";
        // $newUser->email = "admin@gmail.it";
        // $newUser->password = Hash::make('password');
        // $newUser->save();

        for ($i = 0; $i < $num_utenti; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
