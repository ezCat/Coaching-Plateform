<?php

use Illuminate\Database\Seeder;

class InjurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('severities')->insert([
			'name' => 'faible',
			'color' => '#2D2D2D'
		]);
		DB::table('severities')->insert([
			'name' => 'moyenne',
			'color' => '#fff000'
		]);
		DB::table('severities')->insert([
			'name' => 'forte',
			'color' => '#25BD14'
		]);

		DB::table('muscles')->insert([
			'name' => 'genou'
		]);
		DB::table('muscles')->insert([
			'name' => 'cheville'
		]);
		DB::table('muscles')->insert([
			'name' => 'cuisse'
		]);
		DB::table('muscles')->insert([
			'name' => 'poignet'
		]);
		DB::table('muscles')->insert([
			'name' => 'épaule'
		]);
		DB::table('muscles')->insert([
			'name' => 'doigt'
		]);

		DB::table('pathologies')->insert([
			'name' => 'poignet cassé',
			'muscle_id' => 4,
			'severity_id' => 3
		]);
		DB::table('pathologies')->insert([
			'name' => 'genou tordu',
			'muscle_id' => 1,
			'severity_id' => 2
		]);

		DB::table('injuries')->insert([
			'date_injury' => new DateTime(),
			'date_recover_injury' => new DateTime('now +48hours'),
			'player_id' => 1,
			'team_id' => 1,
			'pathology_id' => 1
		]);
    }
}
