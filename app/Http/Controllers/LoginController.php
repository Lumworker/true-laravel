<?php
//ทำงานร่วมกับการroute ใน web.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//ues Authเป็น libary ในการ login ของ framwork

class LoginController extends Controller
{
    public function index()
    {
        return view('login.formlogin');

    }


public function authenticate(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
     
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Get the currently authenticated user...
   
            $user = Auth::user();
                    
            $user->generateToken();
            
            $output = array("token" => $user->api_token);
            //return json response
            return response()->json([
                'data' => $output ,
            ]);
           
        }else{
            return response()->json([
                'error' => 'Invalid Authenticated',
            ],401);
        }
    }
    


public function logout()
    {
        Auth::logout();
        return redirect('login');
            
    }


}
