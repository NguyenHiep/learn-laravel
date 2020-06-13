<?php

use Illuminate\Database\Seeder;

class ProductCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_comments')->truncate();
        $faker = Faker\Factory::create("vi_VN");
        $limit = 50;
        $rangeProduct = DB::table('products')->selectRaw('min(id) AS min_id, max(id) AS max_id')->first();
        $rangeUser = DB::table('customers')->selectRaw('min(id) AS min_id, max(id) AS max_id')->first();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_comments')->insert(
                array(
                    'name'        => $faker->name,
                    'content'     => $faker->text(500),
                    'rate'        => $faker->numberBetween(1, 5),
                    'status'      => $faker->numberBetween(1, 2),
                    'ip_user'     => $faker->ipv4,
                    'product_id'  => $faker->numberBetween($rangeProduct->min_id, $rangeProduct->max_id),
                    'customer_id' => $faker->numberBetween($rangeUser->min_id, $rangeUser->max_id),
                    'updated_at'  => $faker->dateTime(),
                    'created_at'  => $faker->dateTime(),
                )
            );
        }
    }
}
