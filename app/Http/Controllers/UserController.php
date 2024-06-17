<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function store(Request $request)
    {
        $user=new User;
        $user->name=$request->name;
        $user->phonenumber=$request->phonenumber;
        $user->email=$request->email;
        $user->id_role=4;
        $user->password=$request->password;
        $user->save();
        //return redirect()->route('danhsachchucvu');
        return redirect()->back()->with('message', 'Đăng ký thành công');
    }
    
}
