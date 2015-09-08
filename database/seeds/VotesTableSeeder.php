<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create('en_GB');

		for ($i = 0; $i < 50; $i++) {
			for ($j = 0; $j < rand(0,10); $j++) {
				if (rand(0,1)) {
					$vote_up   = 1;
					$vote_down = 0;
				} else {
					$vote_up   = 0;
					$vote_down = 1;
				}
				\App\Vote::create([
					'user_id' => 1,
					'movie_id' => $i,
					'vote_up' => $vote_up,
					'vote_down' => $vote_down,
				]);
			}
		}


    }
}
