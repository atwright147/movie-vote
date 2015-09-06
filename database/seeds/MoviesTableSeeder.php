<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create('en_GB');

		for ($i = 0; $i < rand(0, 999); $i++) {
			\App\Movie::create([
				'title' => $faker->firstName,
				'year'  => $faker->date('Y'),
				'votes' => rand(0, 999),
			]);
		}



    }
}
