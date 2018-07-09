<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
   //ตำสั่งDrop Tableทิ้งทุกตัว และทำการmigrations Fileใหม่หมดทุกตัว-
   //cmd> " php artisan migrate:fresh" จะลบและสร้างใหม่ข้อมูลจะหายหมดเลย "
   // ------------------------------------
   //คำสั่งยิงseeds ข้อมูลใหม่ 
   //cmd > "php artisan db:seed" (ตัวที่จะทำงาน คือตัวที่ถูกcall โดยวงเล็บข้าล่าง)
   //------------------------------
   //cmd > "php artisan migrate:fresh --seed"
   //คือ ลบสร้างmodelใหม่และ ยิงseedเข้าไป หากยังมีข้อมูลในdataและเป็นunique(แบบในemailของ)จะไม่สามารถยิงseedไปซ้ำได้
    public function run()
    {
        //ทุกครั้งที่สร้างไฟล์seeds ต้องมาเพิ่มในนี้เพื่อเวลาseeds all จะรู้ว่ามีไฟล์ไหนบ้าง
        $this->call(UsersTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }

}
