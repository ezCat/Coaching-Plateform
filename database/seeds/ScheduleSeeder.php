<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('places')->insert([
			'name' => 'domicile',
			'color' => 'green'
		]);
		DB::table('places')->insert([
			'name' => 'extérieur',
			'color' => 'red'
		]);

		DB::table('schedules')->insert([
			'date_match' => new DateTime(),
			'club_id' => 1,
			'team_id' => 1,
			'place_id' => 1
		]);
    }
}
