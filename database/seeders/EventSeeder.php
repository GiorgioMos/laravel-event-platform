<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($num_eventi, $num_utenti, Faker $faker)
    {
        for ($i = 0; $i < $num_eventi; $i++) {
            $newEvent = new Event();
            $newEvent->user_id = $faker->numberBetween(1, $num_utenti);
            $newEvent->name = $faker->sentence(3);
            $newEvent->date = $faker->date();
            $newEvent->available_tickets = $faker->randomNumber(3, false);
            $newEvent->save();
        }
    }
}
