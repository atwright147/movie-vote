<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('Seeding should not be executed in the production environment!');
        }

        Model::unguard();

        // empty all tables
        $tables = [
            'movies',
        ];
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // seed the empty tables
        foreach ($tables as $table) {
            $table = str_replace(' ', '', ucwords(str_replace('_', ' ', $table)));
            $this->call($table . 'TableSeeder');
        }

        Model::reguard();
    }
}
