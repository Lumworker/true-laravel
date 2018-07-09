<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;//เป็นการrequest varidate ของframwork
use App\Http\Controllers\Controller;

//สร้างตัวแปร Usermod โดยเรียกฟังชั่นจากไฟล์ user.php
use App\User as UserMod;//adบบรนทัด18
use App\Model\shop as Shopmod;//สร้างให้shopmodel =shopข้างหน้า
use App\Model\Product as ProductMod;

use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        
        $mods = UserMod::paginate(10);//แก้เพื่อเวลาทำpagination จะให้มีกี่แถวต่อหน้า
        return view('admin.user.lists',compact('mods'));


    }

    public function create()
    {
        return view ('admin.user.create');
        //เรียกcreate.blade.php โดยที่ createดังกล่าวต้อง ประกาศ extends และ section
    }

    public function store(Request $request)
    {
           
        request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'age' => 'required|numeric',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);


        $mod = new UserMod;
        $mod->email    = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();

        return redirect('admin/user')// เอาnameจากกล่องinput ทีเราพิมใว้ใน create.blade.php
                    ->with('success', 'User ['.$request->name.'] created successfully.');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = UserMod::find($id);
        //dd($item);
        return view('admin.user.edit', compact('item'));
    }


    public function update(UserRequest $request, $id)
    {
        $request->validated();
        $mod = UserMod::find($id);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->password  =  bcrypt($request->password);
        //$mod->email    = $request->email;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();

        return redirect('admin/users')
                    ->with('success', 'User ['.$request->name.'] updated successfully.');
    }

   
    public function destroy($id)
    { 
        $mod = UserMod::find($id);
        $mod->delete();
        return redirect('admin/users')
                ->with('success', 'User ['.$mod->name.'] deleted successfully.');
    }
}
