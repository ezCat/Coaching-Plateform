<?php

use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('calendar_types')->insert([
			'name' => 'event',
			'color' => 'green'
		]);

		DB::table('calendars')->insert([
		'title' => 'Hello',
		'description' => 'You',
		'begun_at' => new DateTime(),
		'finished_at' => new DateTime('now +4hours'),
		'location' => 'Here',
		'calendar_type_id' => 1,
		'team_id' => 1
		]);
    }
}
