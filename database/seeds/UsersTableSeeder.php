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
		    	'username' => 'supperadmin',
		    	'password' => bcrypt('admin123'),
		    	'level' => 1,
		    	'created_at' => new Datetime()
		    	],
		    	[
		    	'username' => 'admin',
		    	'password' => bcrypt('admin123'),
		    	'level' => 1,
		    	'created_at' => new Datetime()
		    	],
		    	[
		    	'username' => 'member',
		    	'password' => bcrypt('admin123'),
		    	'level' => 2,
		    	'created_at' => new Datetime()
		    	],
		    	[
		    	'username' => 'user',
		    	'password' => bcrypt('admin123'),
		    	'level' => 2,
		    	'created_at' => new Datetime()
		    	]
	    	]
		);
    }
}
