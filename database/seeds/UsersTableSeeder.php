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

	    DB::table('users')->insert(
		    [
			    [
				    'username'   => 'supperadmin',
				    'password'   => bcrypt('admin123'),
				    'level'      => 1,
				    'status'     => 1,
				    'created_at' => new Datetime()
			    ],
			    [
				    'username'   => 'admin',
				    'password'   => bcrypt('admin123'),
				    'level'      => 1,
				    'status'     => 1,
				    'created_at' => new Datetime()
			    ],
			    [
				    'username'   => 'member',
				    'password'   => bcrypt('admin123'),
				    'level'      => 2,
				    'status'     => 1,
				    'created_at' => new Datetime()
			    ],
			    [
				    'username'   => 'user',
				    'password'   => bcrypt('admin123'),
				    'level'      => 3,
				    'status'     => 1,
				    'created_at' => new Datetime()
			    ]
		    ]
	    );

	    $faker = Faker\Factory::create();

	    $limit = 20;

	    for ($i = 0; $i < $limit; $i++) {
		    DB::table('users')->insert([
			    'username'   => $faker->name,
			    'password'   => bcrypt('admin123'),
			    'level'      => $faker->numberBetween(1,3),
			    'status'     => $faker->numberBetween(1,2),
			    'created_at' => new Datetime()
		    ]);
	    }




    }
}
