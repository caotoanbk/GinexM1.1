<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('team_id')->nullable();
            $table->integer('type')->nullable();
            $table->boolean('active')->default(true);
            $table->string('shortname')->nullable();
            $table->string('bophan')->nullable();
            $table->string('mobile')->nullable();
            $table->string('department')->nullable();
            $table->rememberToken();
            });
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