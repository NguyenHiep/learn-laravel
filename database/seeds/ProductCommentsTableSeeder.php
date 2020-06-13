<?php

use Carbon\Carbon;
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
        $listProduct = DB::table('products')
            ->whereNotNull('category_id')
            ->where('category_id', '!=', '')
            ->where('status', config('define.STATUS_ENABLE'))
            ->whereNull('deleted_at')
            ->select(['id'])
            ->get();
        $listProductIds = $listProduct->pluck('id')->toArray();
        $listUser = DB::table('customers')
            ->select(['id'])
            ->whereNull('deleted_at')
            ->get();
        $listUserIds = $listUser->pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_comments')->insert(
                array(
                    'name'        => $faker->name,
                    'content'     => $faker->text(500),
                    'rate'        => $faker->numberBetween(1, 5),
                    'status'      => $faker->numberBetween(1, 2),
                    'ip_user'     => $faker->ipv4,
                    'product_id'  => $faker->randomElement($listProductIds),
                    'customer_id' => $faker->randomElement($listUserIds),
                    'updated_at'  => Carbon::parse()->toDateTime(),
                    'created_at'  => Carbon::parse()->toDateTime(),
                )
            );
        }
    }
}
