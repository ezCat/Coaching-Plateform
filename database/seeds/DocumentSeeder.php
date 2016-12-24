<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create();
		DB::table('documents')->insert([
			'name' => $faker->word,
			'link' => 'https://drive.google.com/open?id=0Bwg_0Xqlmx88dk1WYVJzY1Rtb3c',
			'team_id' => 1
		]);
    }
}
