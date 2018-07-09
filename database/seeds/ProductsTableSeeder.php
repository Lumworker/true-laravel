<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
   //cmd ยิงseed "php artisan db:seed --class=ProductsTableSeeder"
    public function run()
    {
        for($i=1; $i<=100; $i++) {
            for($product=1; $product<=5; $product++) {
                DB::table('products')->insert([
                    'user_id'   => $i,
                    'shop_id'   => $i,
                    'name'      => 'produc-Shop:'.$i.'-'.$product,
                    'desc'      => 'desc',
                    'status'    => rand(0,1)
                ]);
            }
        }
    }
}
