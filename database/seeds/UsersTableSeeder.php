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
        $hunters = 30;
        $directors = 1;
        $sales = 2;
        $accs = 2;
        $its = 1;
        $nauans = 1;
        $ctvs = 6;

        for ($i = 0; $i < $sales; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 5,
                'shortname' => $faker->firstName,
                'bophan' => 'Sales'
            ]);
        }
        for ($i = 0; $i < $ctvs; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 8,
                'shortname' => $faker->firstName,
                'bophan' => 'CTV'
            ]);
        }
        for ($i = 0; $i < $directors; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 2,
                'shortname' => $faker->firstName,
                'bophan' => 'test'
            ]);
        }
        for ($i = 0; $i < $accs; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 1,
                'shortname' => $faker->firstName,
                'bophan' => 'Acc'
            ]);
        }
        for ($i = 0; $i < $directors; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 2,
                'shortname' => $faker->firstName,
                'bophan' => 'Dieu hanh',
            ]);
        }
        for ($i = 0; $i < $its; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 7,
                'shortname' => $faker->firstName,
                'bophan' => 'IT'
            ]);
        }
        for ($i = 0; $i < $nauans; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => 'pass222',
                'type' => 6,
                'shortname' => $faker->firstName,
                'bophan' => 'Nau an'
            ]);
        }
        for ($i = 0; $i < $hunters; $i++) {
        	DB::table('users')->insert([
        		'name' => $faker->name,
        		'email' => $faker->unique()->email,
        		'password' => 'pass222',
                'type' => 4,
                'shortname' => $faker->firstName,
                'bophan' => 'Tuyen dung'
        	]);
        }

    }
}
