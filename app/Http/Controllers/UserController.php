<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function forget(){
        return view('forget');
    }
    public function store(Request $request)
    {
        $user=new User;
        $user->name=$request->name;
        $user->phonenumber=$request->phonenumber;
        $user->email=$request->email;
        $user->id_role=1;
        $user->password=$request->password;
        $user->save();
        //return redirect()->route('danhsachchucvu');
        return redirect()->back()->with('message', 'Đăng ký thành công');
    }
    public function quenmk(Request $request)
    {
        $token=strtoupper(Str::random(10));
        $user=User::where('email',$request->email)->first();
       
        User::where('id_user', $user->id_user)->update(['token' => $token]);
        $user=User::where('email',$request->email)->first();

        Mail::send('check_email_forget',compact('user'), function($email) use($user){
            $email->subject('MyShopng- lay lai mat khau tai khoan');
            $email->to($user->email,$user->name); });
            return redirect()->back()->with('message', 'Vui long check mail');
       
    }
    public function getPass($id, $token){
        $user=User::where('id_user',$id)->first();
        if($user->token===$token){
            return view('getPass');
        }
        return abort(404);
    }
    
    public function postGetPass($id, $token, Request $request)
    {
        /* $request->validate([
            'password'=>'required',
            'confirm_password=>'required|same:password',
        ]);
        */
        $password_h=password_hash($request->password, PASSWORD_DEFAULT);

        User::where('id_user', $id)->update(['password'=>$password_h,'token' => null]);
        return redirect()->back()->with('message', 'dangnhap');

    }
}
