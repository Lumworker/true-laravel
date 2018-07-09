<?php
//เป็นการทำงานกับ หน้าweb หน้า formต่างๆ
//เพิ้ม routeที่หน้านี้

Route::get('/', function () {
    return view('welcome');
});
Route::get('demoone/', 'DemoController@index');
Route::post('demotwo/', 'DemoController@demotwo');
//Route::methodว่าเป็นget,postใช้โปรแกรม postman ในการช่วย('ชื่อURL/', 'ชื่อคลาส@function');
Route::any('/demofour', 'DemoController@demofour');
//การroute ออกไปแบบทุก method

Route::get('demofive/{id?}', function ($id=123) {//ถ้าไม่มีค่า idจะ defelt เป็น123
    return 'ID: '.$id;
});


Route::get('demosix/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' || NAME: '.$name;
});
//route แบบไม่ต้องเข้าcontroller มีใว้เพื่อลองเช็คค่า
//http://www.training.me/demosix/ค่าID/ค่าName

Route::prefix('admin')->group(function () {//routeที่จะต้องมี/adminนำหน้า ถ้าไม่มีเข้าได้
    Route::match(['get', 'post'], 'demothree', 'DemoController@demothree');
    Route::any('demofour', 'DemoController@demofour');
});
//ประเภทprefix จะทำให้admin โดยมี->groupคือทำให้routeข้างล่างจะต้อง/adminก่อนเข้าถึงlink

Route::get('demoten/age/{age}/school/{school}', function ($age, $school) { //demoten/age/อายุ/school/ชื่อโรงเรียน
    return 'demoten age: '.$age.' || SCHOOL: '.$school;
});
//ต้องนำโค้ดGlobal Constraints ไปใส่ในapp/Providers/RouteServiceProvider.phpก่อน

Route::resource('photos', 'PhotoController');
//เมื่อroute เป็นresource ใช้คอนเซปเรดฟูลคือweb service ทำหน้าที่แสดงผล และให้คนที่เข้ามา นำข้อมูลไปประมวลผลต่อ
//url photos และเรียก functionที่ training/app/Http/controllers.php 
//URL = www.training.me/photos/ชื่อfunctionข้างในClassนั้น

//ลิงค์/admin/users >เรียกข้อมูลจากtraing/apps/http/controllers/admin

Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');//ถ้าพิม URL LOGUOT จะไปlogout
Route::post('login', 'LoginController@authenticate');

//Route::resource('admin/user', 'Admin\UsersController');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', 'Admin\UsersController'); //เป็นการทำใส่/ usersและ ค้นหาในfolderที่เก็บข้อมูลอยู่คือAdmin\UsersController
});

