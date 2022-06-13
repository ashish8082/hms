<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Hash;
use Cookie;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'username'=>'required',
                'password'=>'required'
            ]);
            $admin = Admin::where(["username"=>$request->username])->first();
            
            if(Hash::check($request->password,$admin->password))
            {
                $adminData = Admin::select('username')->where(['username'=>$request->username])->get();
                Session::put(['adminData'=>$adminData]);
                if($request->has('rememberme'))
                {
                    Cookie::queue('adminuser',$request->username,1440);
                    Cookie::queue('adminpwd',$request->password,1440);
                }
                return redirect('admin');
            }
            else 
            {
                 return redirect('/login')->with('msg','Invalid username/Password!!');
            }

        }
        return view('login');
    }
    public function logout()
    {
        Session::forget('adminData');
        return redirect('/login');

    }
}
