<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Auth;
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
        $request->validate([
            'name'=>'required',
            'phonenumber'=>'required|regex:/^0[0-9]{9}$/',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ],[
        'name.required'=>'Không được bỏ trống name',
        'phonenumber.required'=>'Không được bỏ trống phonenumber',
        'phonenumber.regex'=>'Số điện thoại không hợp lệ',

        'email.required'=>'Không được bỏ trống email',
        'email.email'=>'Không phải email hợp lệ',
        'email.unique'=>'email đã tồn tại',
        'password.required'=>'Không được bỏ trống password',

        ]);
        
        $user=new User;
        $user->name=$request->name;
        $user->phonenumber=$request->phonenumber;
        $user->email=$request->email;
        $user->id_role=2;
        $user->password=$request->password;
        $user->save();
        //return redirect()->route('danhsachchucvu');
        return redirect()->back()->with('message', 'Đăng ký thành công');
    }
    public function quenmk(Request $request)
    {
        $request->validate([
            'email'=>'required|exists:users'
        ],[
            'email.required'=>'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.exists'=>'Email này không tồn tại'
        ]);
        $token=strtoupper(Str::random(10));
        $user=User::where('email',$request->email)->first();
       
        User::where('id_user', $user->id_user)->update(['token' => $token]);
        $user=User::where('email',$request->email)->first();

        Mail::send('check_email_forget',compact('user'), function($email) use($user){
            $email->subject('MyShopng- lay lai mat khau tai khoan');
            $email->to($user->email,$user->name); });
            return redirect()->back()->with('message', 'Vui lòng check mail');
       
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
         $request->validate([
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ],[
        'password.required'=>'Không được bỏ trống password',
        'confirm_password.required'=>'Không được bỏ trống confirm_password',
        'confirm_password.same'=>'password khác confirm_password'

        ]);
        
        
        $password_h=password_hash($request->password, PASSWORD_DEFAULT);

        User::where('id_user', $id)->update(['password'=>$password_h,'token' => null]);
        return redirect()->route('login')->with('message', 'Đổi thành công');

    }

    
    public function dangnhap(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ],[
            'email.required'=>'Vui lòng nhập địa chỉ email.',
            'email.email'=>'Không phải email hợp lệ',
            'email.exists'=>'Không phải email không tồn tại',
            'password.required'=>'Không được bỏ trống password'
        ]);
    
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $roles = $user->roles;

        if( $user->id_role==2){
            $request->session()->regenerate();
            return redirect()->route('trangchu'); // Redirect on successful login
        }else{
            return "dddd";
        }
         
    }

    return redirect()->route('login')->with('message', 'Sai mật khẩu hoặc email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
        



        public function trangchu(){
            return view('index');
        }

        public function profile(){
            if (Auth::check() && Auth::User()->id_role==2) {
                     $user=Auth::User();

                    return view('profile',['user'=>$user]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }


        public function editprofile(Request $request)
        {
            $request->validate([
                'phonenumber'=>'nullable|regex:/^0[0-9]{9}$/',
                 'password' => 'nullable',
                 'confirm_password' => 'required_with:password|same:password',

            ],[
            'phonenumber.regex'=>'Số điện thoại không hợp lệ',
            'confirm_password.required_with' => 'Bạn cần xác nhận mật khẩu khi nhập mật khẩu',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp'
            ]);
            
            $user = Auth::user();
            $id = $user->id_user;

            $user=User::find($id);
            $d=0;
            if($request->name!=null){
                $user->name=$request->name;
                $d=$d+1;
            }
            if($request->phonenumber!=null){
            $user->phonenumber=$request->phonenumber;
            $d=$d+1;

            }
            if($request->password!=null){
                $user->password=$request->password;
                $d=$d+1;

            }
            if($d>0){
                $user->update();
            }
            
            //return redirect()->route('danhsachchucvu');
            return redirect()->back()->with('message', 'Sửa thành công');
        }
        
        
        public function admin1(){
            return view('admin1');
        }

    }