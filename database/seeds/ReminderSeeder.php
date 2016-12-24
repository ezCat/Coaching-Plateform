<?php

use Illuminate\Database\Seeder;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('reminders')->insert([
			'title' => 'domicazeazile',
			'description' => 'Hello',
			'day' => 'lundi',
			'icon' => 'fa fa-hand-o',
			'team_id' => 1
		]);
    }
}
