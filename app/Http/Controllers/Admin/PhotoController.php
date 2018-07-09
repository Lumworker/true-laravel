<?php

namespace App\Http\Controllers\Admin;
//สร้างโดยcmd คำสั่ง "php artisan make:controller PhotoController --resource" หน้า34
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
                 
    public function index()
    {
        return 'Index';
    }

   
    public function create()
    {
        return 'create';
    }

  
    public function store(Request $request)
    {
        echo 'store';
         dd($request);
        //ddใช้ในการprint object ให้ดูสวยงาม
    }

  
    public function show($id)
    {
        return 'show :'.$id;
    }


    public function edit($id)
    {
        return 'edit :'.$id;
    }


    public function update(Request $request, $id)
    {
        return 'update :'.$id;
    }


    public function destroy($id)
    {
        return 'destroy :'.$id;
    }
}
