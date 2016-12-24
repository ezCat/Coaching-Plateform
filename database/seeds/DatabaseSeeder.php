<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(TeamSeeder::class);
		$this->call(DocumentSeeder::class);
		$this->call(ScheduleSeeder::class);
		$this->call(InjurySeeder::class);
		$this->call(CalendarSeeder::class);
		$this->call(ReminderSeeder::class);
    }
}
