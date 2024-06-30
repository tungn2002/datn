<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialist;
use App\Models\PatientRecord;
use App\Models\Appointment;
use App\Models\Clinic;
use Carbon\Carbon;
use App\Models\MedicalResult;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;

use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

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

        if( $user->id_role==2){
            $request->session()->regenerate();
            return redirect()->route('trangchu'); // Redirect on successful login
        }else if($user->id_role==1){
            return redirect()->route('admin1');;
        }else if($user->id_role==4){
            return redirect()->route('empl');;

        }else{
            return redirect()->route('doctor');;
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
//
               $patientRecords = PatientRecord::where('id_user', Auth::User()->id_user)->paginate(2);
               $results = DB::table('medicalresults')
               ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->where('users.id_user', Auth::User()->id_user)
               ->select('medicalresults.*')
               ->paginate(2);
                    return view('profile',['user'=>$user,'patientRecords'=>$patientRecords,'results'=>$results]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }
        public function profile2(){
            if (Auth::check() && Auth::User()->id_role==2) {
                     $user=Auth::User();
//
               $patientRecords = PatientRecord::where('id_user', Auth::User()->id_user)->paginate(2);
               $results = DB::table('medicalresults')
               ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->where('users.id_user', Auth::User()->id_user)
               ->select('medicalresults.*')
               ->paginate(2);
                    return view('profile2',['user'=>$user,'patientRecords'=>$patientRecords,'results'=>$results]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }
        public function profile3(){
            if (Auth::check() && Auth::User()->id_role==2) {
                     $user=Auth::User();
//
               $results = DB::table('medicalresults')
               ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->where('users.id_user', Auth::User()->id_user)
               ->where('medicalresults.status', 'chờ duyệt')
               ->select('medicalresults.*')
               ->paginate(2);
                    return view('profile3',['results'=>$results]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }

        public function profile32(){
            if (Auth::check() && Auth::User()->id_role==2) {
                     $user=Auth::User();
//
               $results = DB::table('medicalresults')
               ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->where('users.id_user', Auth::User()->id_user)
               ->where('medicalresults.status', 'chưa thanh toán')
               ->select('medicalresults.*')
               ->paginate(2);
                    return view('profile32',['results'=>$results]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }

        public function profile33(){
            if (Auth::check() && Auth::User()->id_role==2) {
                     $user=Auth::User();
//
                $statuses = ['đã khám', 'đã thanh toán'];
                $results = DB::table('medicalresults')
               ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->where('users.id_user', Auth::User()->id_user)
               ->whereIn('medicalresults.status', $statuses)
               ->select('medicalresults.*')
               ->paginate(2);
                    return view('profile33',['results'=>$results]);
            } else {
                return redirect()->route('login')->with('message', 'Bạn chưa đăng nhập');

            }
        }
       
        //
        public function xoaddk(Request $request)
        {
            $request->validate([
                'id_result' => 'required|exists:medicalresults,id_result',
            ]);
    
            $medicalResult = MedicalResult::find($request->id_result);
            $medicalResult->delete();
            return redirect()->back()->with('message', 'Xóa đơn bệnh thành công');
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







//nhanvien

        public function empl(){
            return view('empl');
        }


//

public function choduyet_empl()
{
    $medicalResults = MedicalResult::where('status', 'chờ duyệt')->paginate(5);

    return view('empl_2', [
        'medicalResults' => $medicalResults,
    ]);
    
}
public function xacnhanduyet($id)
{
  
    if (empty($id)) {
        return redirect()->back()->with('message', 'ID đơn đặt khám hợp lệ.');
    }

    $medicalResults = MedicalResult::find($id);

    if (!$medicalResults) {
        return redirect()->back()->with('message', 'Không tìm thấy.');
    }

    $medicalResults = MedicalResult::find($id);
    $medicalResults->status='chưa thanh toán';
    $medicalResults->update();
    return redirect()->back()->with('message', 'Duyệt thành công');
}


public function chothanhtoan_empl()
{
    $medicalResults = MedicalResult::where('status', 'chưa thanh toán')->paginate(5);

    return view('empl_3', [
        'medicalResults' => $medicalResults,
    ]);
    
}
public function xacnhanthanhtoan($id)
{
  
    if (empty($id)) {
        return redirect()->back()->with('message', 'ID đơn đặt khám hợp lệ.');
    }

    $medicalResults = MedicalResult::find($id);

    if (!$medicalResults) {
        return redirect()->back()->with('message', 'Không tìm thấy.');
    }

    $medicalResults = MedicalResult::find($id);
    $medicalResults->status='đã thanh toán';
    $medicalResults->update();
    return redirect()->back()->with('message', 'Duyệt thành công');
}


public function dathanhtoan_empl()
{
    $statuses = ['đã khám', 'đã thanh toán'];

    $medicalResults = DB::table('medicalresults')
    ->whereIn('medicalresults.status', $statuses)
    ->select('medicalresults.*')
    ->paginate(5);
    return view('empl_4', [
        'medicalResults' => $medicalResults
    ]);
    
    
}


public function doctor(){
    return view('doctor');
}

public function lichlamviec()
{

    $userId = Auth::user()->id_user;

    $statuses = ['chưa thanh toán', 'đã thanh toán','đã khám'];

    $mrRecords = DB::table('appointments')
    ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
    ->join('medicalresults', 'appointments.id_appointment', '=', 'medicalresults.id_sch')
    ->where('clinics.id_user', $userId)
    ->whereIn('medicalresults.status', $statuses)
    ->select('appointments.*')
    ->get();

    
    $markedDates = $mrRecords->pluck('day')->toArray();
    return view('doctor_2', [
        'mrRecords' => $mrRecords,'markedDates'=>$markedDates
    ]);
    

}


public function lichlamviecf($date)
{


    $userId = Auth::user()->id_user;
  
  
    $statuses = ['chưa thanh toán', 'đã thanh toán', 'đã khám'];

    $mrRecords = DB::table('appointments')
    ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
    ->join('medicalresults', 'appointments.id_appointment', '=', 'medicalresults.id_sch')
    ->where('clinics.id_user', $userId)
    ->whereIn('medicalresults.status', $statuses)
    ->select('appointments.*')
    ->get();


    $markedDates = $mrRecords->pluck('day')->toArray();
    //
    $clinic = Clinic::where('id_user', $userId)->firstOrFail();

    $results = DB::table('medicalresults')
    ->join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->where(function($query) {
        $query->where('medicalresults.status', 'chưa thanh toán')
              ->orWhere('medicalresults.status', 'đã thanh toán')
              ->orWhere('medicalresults.status', 'đã khám');

    })
    ->where('appointments.id_clinic', $clinic->id_clinic)
    ->where('appointments.day', Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d'))
    ->paginate(5); 
    
    return view('doctor_2', [
        'mrRecords' => $mrRecords,'markedDates'=>$markedDates,'results'=>$results
    ]);
    

}

public function lichlamviecdetail($id)
{
    $patientRecords = DB::table('patientrecords')
    ->join('medicalresults', 'patientrecords.id_pr', '=', 'medicalresults.id_mr')
    ->select('patientrecords.*', 'medicalresults.reason')
    ->where('medicalresults.id_sch', $id)
    ->first();

    $updatekq=DB::table('medicalresults')
    ->where('medicalresults.id_sch', $id)
    ->where('medicalresults.id_mr',   $patientRecords->id_pr)
    ->whereIn('medicalresults.status', ['đã thanh toán', 'đã khám'])
    ->first();
$dk=null;

    if($updatekq){
        if($updatekq->status=='đã khám'){
                    $dk=$updatekq->id_result;
        }
    }

    return view('doctor_2detail', [
        'patientRecords' => $patientRecords,'updatekq'=>$updatekq, 'dk'=>$dk
    ]);


}
public function capnhatkq(Request $request,$id)
{
    $validatedData = $request->validate([
        'detail' => 'required',
        'image' => 'nullable|image',
        
    ], [
        'detail.required' => 'Chi tiết là bắt buộc.',
        'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.',
    ]);

   

//

    $medicalResult = MedicalResult::find($id);

    $medicalResult->status='đã khám';
    
    $medicalResult->detail=$request->detail;
    if($medicalResult->id_prescription==null){
        $pre=new Prescription;
        $pre->name="Chưa có";
        $pre->diagnostic="Chưa có";
        $pre->day= Carbon::now()->format('Y-m-d');
        $pre->save();
            $medicalResult->id_prescription=$pre->id_pre;

    }

    if($request->image!=null){
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('image'), $imageName); 
    $medicalResult->image = $imageName; 
    }

    $medicalResult->update();
    
   
    return redirect()->back()->with('message', 'Cập nhật kết quả khám bệnh thành công');
}
public function themdonthuoc($id)
{
//chi co 1 don
    $mr=DB::table('prescriptions')
    ->join('medicalresults', 'prescriptions.id_pre', '=', 'medicalresults.id_prescription')
    ->where('medicalresults.id_result', $id)
    ->first();

    $medi= DB::table('medicines')
    ->whereNotIn('id_medicine', function($query) use ($mr) {
        $query->select('id_medicine')
              ->from('prescription_medicines')
              ->where('id_prescription', $mr->id_prescription);
    })
    ->get();

    $pm=DB::table('prescription_medicines')
    ->where('prescription_medicines.id_prescription', $mr->id_prescription)
    ->get();
    return view('doctor_2donthuoc', [
        'mr' => $mr,'medi'=>$medi,'pm'=>$pm
    ]);
}

public function capnhatdt(Request $request,$id)
{
    $validatedData = $request->validate([
        'id_medicine' => 'required',
        'information' => 'required',

        
    ], [
        'id_medicine.required' => 'Chưa chọn thuốc.',
        'information.required' => 'Chưa nhập liều lượng.',
    ]);

    $pm=new PrescriptionMedicine;
    $pm->id_prescription=$id;
    $pm->id_medicine=$request->id_medicine;
    $pm->information=$request->information;
    $pm->save();

    $pr = Prescription::find($id);

    $pr->day= Carbon::now()->format('Y-m-d');
    $pr->update();
    return redirect()->back()->with('message', 'Cập nhật thuốc thành công');
}


public function capnhatttdt(Request $request,$id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'diagnostic' => 'required',

        
    ], [
        'detail.required' => 'Tên là bắt buộc.',
        'diagnostic.required' => 'Chuẩn đoán là bắt buộc.',
    ]);

   

//

    $pr = Prescription::find($id);

    $pr->name=$request->name;
    $pr->diagnostic=$request->diagnostic;
    $pr->day= Carbon::now()->format('Y-m-d');


    $pr->update();

   
    return redirect()->back()->with('message', 'Cập nhật kết quả khám bệnh thành công');
}

public function xoadtd(Request $request)
{
    $request->validate([
        'id_prescription'=>'required',
        'id_medicine'=>'required',

    ],[
    'id_prescription.required'=>'Hãy chọn thuốc cần xóa',
    'id_medicine.required'=>'Hãy chọn thuốc cần xóa',

    ]);

    PrescriptionMedicine::where('id_prescription', $request->id_prescription)
    ->where('id_medicine', $request->id_medicine)
    ->delete();

    return redirect()->back()->with('message', 'Xóa thành công');

}
    }   