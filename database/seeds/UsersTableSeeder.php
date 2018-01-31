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
                    'email'      => 'supperadmin@gmail.com',
                    'password'   => bcrypt('admin123'),
                    'level'      => 1,
                    'status'     => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
			    ],
			    [
				    'username'   => 'admin',
                    'email'      => 'admin@gmail.com',
				    'password'   => bcrypt('admin123'),
				    'level'      => 1,
				    'status'     => 1,
				    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
			    ],
			    [
				    'username'   => 'member',
                    'email'      => 'member@gmail.com',
				    'password'   => bcrypt('admin123'),
				    'level'      => 2,
				    'status'     => 1,
				    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
			    ],
			    [
				    'username'   => 'user',
                    'email'      => 'user@gmail.com',
				    'password'   => bcrypt('admin123'),
				    'level'      => 3,
				    'status'     => 1,
				    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
			    ]
		    ]
	    );

	    $faker = Faker\Factory::create();

	    $limit = 20;

	    for ($i = 0; $i < $limit; $i++) {
		    DB::table('users')->insert([
                'username'   => $faker->unique()->userName(),
                'email'      => $faker->unique()->email(),
                'password'   => bcrypt('admin123'),
                'level'      => $faker->numberBetween(1, 3),
                'status'     => $faker->numberBetween(1, 2),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
		    ]);
	    }




    }
}
