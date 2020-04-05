<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();
        $faker = Faker\Factory::create();
        $limit = 50;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('customers')->insert([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'username'   => $faker->unique()->userName(),
                'email'      => $faker->unique()->email(),
                'last_login' => \Carbon\Carbon::now(),
                'password'   => bcrypt('admin123'),
                'phone'      => $faker->e164PhoneNumber,
                'gender'     => $faker->numberBetween(1, 2),
                'birthday'   => $faker->date(),
                'address'    => $faker->address,
                'status'     => $faker->numberBetween(1, 2),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
