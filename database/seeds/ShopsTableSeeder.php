<?php

use Illuminate\Database\Seeder;

//สร้างโดยcmdคำสั่ง --> php artisan make:seeder ShopTableSeeder
class ShopsTableSeeder extends Seeder
{
    public function run()
    {
        for($i=1; $i<=10; $i++) {
	DB::table('shops')->insert([
        'user_id'   => $i,
        'name'      => 'ShopID:'.$i.'-UserID:'.$i,
        'desc'      => 'desc',
    ]);
}

    }
}

// (คำสั่งยิงSeedsเข้า database เฉพาะ ตัว)
// ในcmd> "php artisan make:seeder ShopsTableSeeder"

// (คำสั่งยิงSeedsเข้า database ทุก ตัว)
 //ในcmd> "php artisan db:seed" 