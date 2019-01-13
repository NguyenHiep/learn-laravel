<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("vi_VN");
        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('comments')->insert(
                array(
                    'name'           => $faker->name,
                    'email'          => $faker->email,
                    'content'        => $faker->text(500),
                    'url'            => $faker->url,
                    'comment_status' => $faker->numberBetween(1, 2),
                    'ip_user'        => $faker->ipv4,
                    'posts_id'       => 1,//$faker->unique()->randomDigit,
                    'rate'           => $faker->numberBetween(1, 5),
                    'comment_parent' => $faker->numberBetween(0, 5),
                    'updated_at'     => $faker->dateTime(),
                    'created_at'     => $faker->dateTime(),
                )
            );
        }
    }
}
