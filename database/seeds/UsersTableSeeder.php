<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        //ในcmd> "php artisan db:seed" เพื่อนำค่าseedทุกไฟล์ เข้า sever
        $cities = array("bangkok", "nakornpathom");

        for($i=1; $i<=100; $i++) {
            $key   = array_rand($cities);
            $city = $cities[$key];

          DB::table('users')->insert([
              'name'     => 'user'.$i,
              'surname'  => 'surname'.$i,
              'email'    => 'user'.$i.'@gmail.com',
              'password' => bcrypt('password'),
              'age'      => rand(18,22),
              'address'  => 'my_address'.$i,
              'city'     => $city,
              'mobile'   => '089-9999999',
              'active'   => rand(0,1)
          ]);

    }
}
}
