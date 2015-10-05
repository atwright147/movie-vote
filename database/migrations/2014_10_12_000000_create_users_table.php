<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('facebook_id')->unique();
            $table->index('facebook_id');

            $table->string('avatar');

            $table->rememberToken();
            $table->tinyInteger('admin');
            $table->timestamps();
        });

        // add a default admin user
        $timestamps = [
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ];

        DB::table('users')->insert(
            Config::get('seeding.adminUser') + $timestamps
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
