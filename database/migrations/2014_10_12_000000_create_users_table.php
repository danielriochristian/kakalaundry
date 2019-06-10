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
          $table->rememberToken();
          $table->timestamps();
      });

      DB::table('users')->insert(
          array(
              'name' => 'Daniel Rio Christian',
              'email' => 'daniel41697@gmail.com',
              'password' => '$2y$12$PIyiHeR5BDSwwjUD8tA8NuoXxYY9ecA0OARz/rTVGl31HsmPTrV6G'
          )
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
