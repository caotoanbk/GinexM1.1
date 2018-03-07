<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 33;
        for ($i = 0; $i < $limit; $i++) {
        	DB::table('users')->insert([
        		'name' => $faker->name,
        		'email' => $faker->unique()->email,
        		'password' => 'pass222',
                'type' => 4,
                'shortname' => $faker->firstName,
                'bophan' => 'test'
        	]);
        }
    }
}
