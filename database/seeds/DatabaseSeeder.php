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
        // $this->call(UsersTableSeeder::class);
        
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users seeded.');
        $this->call(CommentsTableSeeder::class);
        $this->command->info('Comments seeded.');
        $this->call(CustomersTableSeeder::class);
        $this->command->info('Customers seeded.');
        Model::reguard();

    }
}
