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
use App\Models\Medicine;

use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class UserController extends Controller
{
    //3 trang
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
        
    }
    public function forget(){
        return view('forget');
    }
    //đang ký
    public function store(Request $request)
    {
        $request->validate([ 
            'name'=>'required|max:20',
            'phonenumber'=>'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'
        ],[
        'name.required'=>'Không được bỏ trống tên',
        'name.max'=>'Tên quá dài, chỉ được phép <20',
        'phonenumber.required'=>'Không được bỏ trống số điện thoại',
        'phonenumber.regex'=>'Số điện thoại không hợp lệ',
        'phonenumber.unique'=>'Số điện thoại đã tồn tại',
        'email.required'=>'Không được bỏ trống email',
        'email.email'=>'Không phải email hợp lệ',
        'email.unique'=>'email đã tồn tại',
        'password.required'=>'Không được bỏ trống mật khẩu',
        'password.min'=>'Mật khẩu có độ dài trên 6',

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
    //Quên mk
    public function quenmk(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users'
        ],[
            'email.required'=>'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.email'=>'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.exists'=>'Email này không tồn tại'
        ]);

        $token=strtoupper(Str::random(10));
        $user=User::where('email',$request->email)->first();
       
        User::where('id_user', $user->id_user)->update(['token' => $token]);
        $user=User::where('email',$request->email)->first();

        Mail::send('check_email_forget',compact('user'), function($email) use($user){
            $email->subject('Đặt lại mật khẩu');
            $email->to($user->email,$user->name); });
            return redirect()->back()->with('message', 'Vui lòng check mail');
       
    }
    //trang đổi mật khẩu
    public function getPass($id, $token){
        $user=User::where('id_user',$id)->first();
        if($user->token===$token){
            return view('getPass');
        }
        return abort(404);
    }
    //nhập mk mới
    public function postGetPass($id, $token, Request $request)
    {
         $request->validate([
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password'
        ],[
        'password.required'=>'Không được bỏ trống password',
        'confirm_password.required'=>'Không được bỏ trống confirm_password',
        'confirm_password.same'=>'password khác confirm_password',
        'password.min'=>'Mật khẩu có độ dài trên 6',

        ]);
        
        
        $password_h=password_hash($request->password, PASSWORD_DEFAULT);

        User::where('id_user', $id)->update(['password'=>$password_h,'token' => null]);
        return redirect()->route('login')->with('message', 'Đổi thành công');

    }

    //đăng nhập
    public function dangnhap(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required'=>'Không được bỏ trống email',
            'password.required'=>'Không được bỏ trống mật khẩu'
        ]);
    
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if( $user->id_role==2){
            $request->session()->regenerate();
            return redirect()->route('trangchu')->with('message', 'Đăng nhập thành công'); // Redirect on successful login
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
               ->join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
               ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
               ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
               ->join('services', '.clinics.id_service', '=', 'services.id_service')
               ->where('users.id_user', Auth::User()->id_user)
               ->where('medicalresults.status', 'chờ duyệt')
               ->select('medicalresults.*', 'patientrecords.prname','appointments.day','appointments.time','appointments.finishtime','clinics.clinicname','services.servicename','services.price')
               ->orderBy('medicalresults.id_result', 'desc') 
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
->join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
->join('users', 'patientrecords.id_user', '=', 'users.id_user')
->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
->join('services', '.clinics.id_service', '=', 'services.id_service')
->where('users.id_user', Auth::User()->id_user)
->where('medicalresults.status', 'chưa thanh toán')
->select('medicalresults.*', 'patientrecords.prname','appointments.day','appointments.time','appointments.finishtime','clinics.clinicname','services.servicename','services.price')
->orderBy('medicalresults.id_result', 'desc') 
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
                ->join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
                ->join('users', 'patientrecords.id_user', '=', 'users.id_user')
                ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
                ->join('services', '.clinics.id_service', '=', 'services.id_service')
                ->where('users.id_user', Auth::User()->id_user)
                ->whereIn('medicalresults.status', $statuses)
                ->select('medicalresults.*', 'patientrecords.prname','appointments.day','appointments.time','appointments.finishtime','clinics.clinicname','services.servicename','services.price')
                ->orderBy('medicalresults.id_result', 'desc') 
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
            return redirect()->back()->with('message', 'Xóa đơn khám bệnh thành công');
        }
    

        public function editprofile(Request $request)
        {
            $request->validate([
                'name'=>'required|max:20',
                'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber,' .  Auth::user()->id_user. ',id_user',                 
                'password' => 'nullable|min:6',
                 'confirm_password' => 'required_with:password|same:password',

            ],[
            'name.required'=>'Không được bỏ trống name',
            'name.max'=>'Tên quá dài, chỉ được phép <20',
            'phonenumber.required'=>'Không được bỏ trống phonenumber',
            'phonenumber.regex'=>'Số điện thoại không hợp lệ',
            'phonenumber.unique'=>'Số điện thoại đã tồn tại',
            'password.min'=>'Mật khẩu có độ dài trên 6',

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







//nhân viên
//trang thông tin
        public function empl(){
            return view('empl');
        }


//trang danh sách chờ duyệt

public function choduyet_empl()
{
    $medicalResults = MedicalResult::join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
    ->where('medicalresults.status', 'chờ duyệt')
    ->select('medicalresults.*', 'appointments.*', 'patientrecords.*')
    ->paginate(5);

    return view('empl_2', [
        'medicalResults' => $medicalResults,
    ]);
    
}
public function findchoduyet(Request $request)
{
    
    $medicalResults = MedicalResult::join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
    ->where('medicalresults.status', 'chờ duyệt')
    ->where('patientrecords.phonenumber',  $request->dl)
    ->select('medicalresults.*', 'appointments.*', 'patientrecords.*')
    ->paginate(5);

    return view('empl_2', [
        'medicalResults' => $medicalResults,
    ]);
    
}
public function xacnhanduyet($id)
{
  
    if (empty($id)) {
        return redirect()->back()->with('message', 'ID đơn đặt khám hợp lệ.');
    }

    $exists = MedicalResult::where('id_result', $id)
    ->where('status', 'chờ duyệt')
    ->exists();

    if (!$exists) {
        return redirect()->back()->with('message', 'Không tìm thấy đơn.');
    }

    $medicalResults = MedicalResult::find($id);
    $medicalResults->status='chưa thanh toán';
    $medicalResults->update();
    return redirect()->back()->with('message', 'Duyệt thành công');
}


public function chothanhtoan_empl()
{
    $medicalResults = MedicalResult::join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
    ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
    ->join('services', 'clinics.id_service', '=', 'services.id_service')
    ->where('medicalresults.status', 'chưa thanh toán')
    ->select('medicalresults.*', 'appointments.*', 'patientrecords.*','services.*')
    ->paginate(5);

    return view('empl_3', [
        'medicalResults' => $medicalResults,
    ]);
    
}

public function findchothanhtoan(Request $request)
{
    $medicalResults = MedicalResult::join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
    ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
    ->join('services', 'clinics.id_service', '=', 'services.id_service')
    ->where('medicalresults.status', 'chưa thanh toán')
    ->where('patientrecords.phonenumber',  $request->dl)
    ->select('medicalresults.*', 'appointments.*', 'patientrecords.*','services.*')
    ->paginate(5);

    return view('empl_3', [
        'medicalResults' => $medicalResults,
    ]);
    
}
public function xacnhanthanhtoan($id)
{
  
    if (empty($id)) {
        return redirect()->back()->with('message', 'ID đơn đặt khám hợp lệ.');
    }

    
    $exists = MedicalResult::where('id_result', $id)
    ->where('status', 'chưa thanh toán')
    ->exists();

    if (!$exists) {
        return redirect()->back()->with('message', 'Không tìm thấy đơn.');
    }
    $medicalResults = MedicalResult::find($id);
    $medicalResults->status='đã thanh toán';
    $medicalResults->update();
    return redirect()->back()->with('message', 'Thanh toán thành công');
}


public function dathanhtoan_empl()
{
    $statuses = ['đã khám', 'đã thanh toán'];

    $medicalResults = MedicalResult::join('appointments', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
    ->join('patientrecords', 'medicalresults.id_mr', '=', 'patientrecords.id_pr')
    ->join('clinics', 'appointments.id_clinic', '=', 'clinics.id_clinic')
    ->join('services', 'clinics.id_service', '=', 'services.id_service')
    ->whereIn('medicalresults.status', $statuses)
    ->select('medicalresults.*', 'appointments.*', 'patientrecords.*','services.*')
    ->paginate(5);
    
    return view('empl_4', [
        'medicalResults' => $medicalResults
    ]);
    
    
}


public function doctor(){
    $medicine = Medicine::paginate(5); 
    $sp = Specialist::where('id_specialist',Auth::user()->id_specialist)->first();
    //phong va dichvu
    $clinic= Clinic::join('services', 'clinics.id_service', '=', 'services.id_service')
    ->where('clinics.id_user',Auth::user()->id_user)
    ->select('clinics.*', 'services.*')
    ->first();
    //
    return view('doctor',['medicine' => $medicine,'sp'=>$sp,'clinic'=>$clinic]);
}
public function findthuoc(Request $request){

$medicine = Medicine::where('medicinename','like', '%'.$request->dl.'%')->paginate(3);

    return view('doctor',['medicine' => $medicine]);
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
        'detail.required' => 'Không được bỏ trống kết quả',
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
//Lấy thuốc đã có
    $mr=DB::table('prescriptions')
    ->join('medicalresults', 'prescriptions.id_pre', '=', 'medicalresults.id_prescription')
    ->where('medicalresults.id_result', $id)
    ->first();
//Lấy thuốc trừ các thuốc đã có
    $medi= DB::table('medicines')
    ->whereNotIn('id_medicine', function($query) use ($mr) {
        $query->select('id_medicine')
              ->from('prescription_medicines')
              ->where('id_prescription', $mr->id_prescription);
    })
    ->get();
//Trả về thông tin
    $pm=DB::table('prescription_medicines')
    ->join('medicines', 'prescription_medicines.id_medicine', '=', 'medicines.id_medicine')
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
        'id_medicine.required' => 'Không được bỏ trống thuốc',
        'information.required' => 'Không được bỏ trống liều lượng',
    ]);

    $pm=new PrescriptionMedicine;
    $pm->id_prescription=$id;
    $pm->id_medicine=$request->id_medicine;
    $pm->information=$request->information;
    $pm->save();

    $pr = Prescription::find($id);

    $pr->day= Carbon::now()->format('Y-m-d');
    $pr->update();
    return redirect()->back()->with('message', 'Cập nhật đơn thuốc thành công');
}


public function capnhatttdt(Request $request,$id)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'diagnostic' => 'required',

        
    ], [
        'name.required' => 'Không được bỏ trống tên',
        'diagnostic.required' => 'Không được bỏ trống chuẩn đoán',
    ]);

   

//

    $pr = Prescription::find($id);

    $pr->name=$request->name;
    $pr->diagnostic=$request->diagnostic;
    $pr->day= Carbon::now()->format('Y-m-d');


    $pr->update();

   
    return redirect()->back()->with('message', 'Cập nhật đơn thuốc thành công');
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

//khi chat

public function themdonthuoc2($id)
{
//chi co 1 don
$mrz=DB::table('consults') ->where('consults.id_cons', $id)->first();


    $mr=DB::table('prescriptions')
    ->where('id_pre', $mrz->id_prescription)
    ->first();

    //thuoc list
    $medi= DB::table('medicines')
    ->whereNotIn('id_medicine', function($query) use ($mrz) {
        $query->select('id_medicine')
              ->from('prescription_medicines')
              ->where('id_prescription', $mrz->id_prescription);
    })
    ->get();
    //donthuoc
    $pm=DB::table('prescription_medicines')
    ->where('prescription_medicines.id_prescription', $mrz->id_prescription)
    ->get();
    return view('doctor_2donthuoc', [
        'mr' => $mr,'medi'=>$medi,'pm'=>$pm
    ]);
}
//admin quản lý bác sĩ
//thembacsi
public function qldoctor(){
    $specialist= DB::select('SELECT * from specialists');
    $user = DB::table('users')
    ->where('users.id_role', 3)
    ->select('users.*')
    ->paginate(5);

    return view('qldoctor', ['user' => $user,'specialist' => $specialist]);
}


public function addqldoctor(Request $request)
{
    $request->validate([
        'name' => 'required|max:20',
'password' => 'required|min:6',
'phonenumber'=>'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber',
'email'=>'required|email|unique:users,email',
'avatar' => 'required|image',
'signature' => 'required|image',
'price' => 'required|numeric|min:10000',
'id_specialist' => 'required|exists:specialists,id_specialist',
    ],[
        'name.required' => 'Không được bỏ trống tên.',
        'password.required' => 'Không được bỏ trống mật khẩu.',
        'name.max' => 'Tên quá dài phải <20 ký tự.',
        'password.min' => 'Mật khẩu quá ngắn phải >6 ký tự.',
        'phonenumber.required' => 'Không được bỏ trống điện thoại.',
        'phonenumber.regex' => 'Số điện thoại không hợp lệ',
        'phonenumber.unique' => 'Số điện thoại bị trùng.',
        'email.required' => 'Không được bỏ trống email.',
        'email.email' => 'Email không hợp lệ.',
        'email.unique' => 'Email đã tồn tại.',
        'avatar.required' => 'Không được bỏ trống ảnh đại diện.',
        'avatar.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
        'signature.required' => 'Không được bỏ trống chữ ký.',
        'signature.image' => 'Chữ ký phải là định dạng hình ảnh.',
        'price.required' => 'Không được bỏ trống giá.',
        'price.numeric' => 'Giá phải là số.',
        'price.min' => 'Giá phải lớn hơn hoặc bằng 10000.',
        'id_specialist.required' => 'Không được bỏ trống chuyên khoa.',
        'id_specialist.exists' => 'Chuyên khoa không tồn tại.'
    ]);
    

         $u=new User;
         $u->name=$request->name;
         $u->password=$request->password;
         $u->email=$request->email;
         $u->phonenumber=$request->phonenumber;
         $u->id_role=3;
         $u->price=$request->price;
         $u->id_specialist=$request->id_specialist;
        
         if($request->working_hours!=null){
            $u->working_hours=$request->working_hours;

         }
         $imageName = time() . '.' . $request->avatar->extension();
         $request->avatar->move(public_path('image'), $imageName); 
         $u->avatar = $imageName; 

         $imageName2 = time() . '.' . $request->signature->extension();
         $request->signature->move(public_path('image'), $imageName2); 
         $u->signature = $imageName2; 

        $u->save();
        return redirect()->back()->with('message', 'Thêm thành công');
}
public function xoaqldoctor(Request $request)
{
    $request->validate([
        'id_user'=>'required|exists:users,id_user',
    ],[
    'id_user.required'=>'Hãy chọn bác sĩ cần xóa',
    'id_user.exists'=>'Không tìm thấy bác sĩ cần xóa',

    ]);
    
    $s = User::find($request->id_user);
    $s->delete();
    return redirect()->back()->with('message', 'Xóa thành công');

}
public function capnhatqldoctor(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:20',
            'password' => 'nullable|min:6',
            'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber,' . $id. ',id_user',                 
    'email' => 'required|email|unique:users,email,' . $id . ',id_user',
    'avatar' => 'nullable|image',
    'signature' => 'nullable|image',
    'price' => 'required|numeric|min:10000',
    'id_specialist' => 'required|exists:specialists,id_specialist',
        ],[
            'name.required' => 'Không được bỏ trống tên.',
            'name.max' => 'Tên quá dài phải <20 ký tự.',
            'password.min' => 'Mật khẩu quá ngắn phải >6 ký tự.',
            'phonenumber.required' => 'Không được bỏ trống số điện thoại.',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại.',
            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'avatar.image' => 'Ảnh đại diện phải là định dạng hình ảnh.',
            'signature.image' => 'Chữ ký phải là định dạng hình ảnh.',
            'price.required' => 'Không được bỏ trống giá.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng 10000.',
            'id_specialist.required' => 'Không được bỏ trống chuyên khoa.',
            'id_specialist.exists' => 'Chuyên khoa không tồn tại.'
        ]);
        
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID bác sĩ không hợp lệ.');
        }
    
        $u = User::find($id);
    
        if (!$u) {
            return redirect()->back()->with('message', 'Không tìm thấy bác sĩ.');
        }

        $user = User::find($id);

        $user->name=$request->name;
        if($request->password!=null){
            $user->password=$request->password;

        }
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;

        if($request->working_hours!=null){
            $user->working_hours=$request->working_hours;

         }
        $user->price=$request->price;
        $user->id_specialist=$request->id_specialist;
        if($request->avatar!=null){
$imageName = time() . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('image'), $imageName); 
        $user->avatar = $imageName; 
        }
        
        if($request->signature!=null){
            $imageName2 = time() . '.' . $request->signature->extension();
            $request->signature->move(public_path('image'), $imageName2); 
            $user->signature = $imageName2; 
        }

        $user->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       //bác sĩ cập nhật khung giừo
    public function updatewh(Request $request)
    {
        $request->validate([
            'wh' => 'required',
        ],[
            'wh.required' => 'Vui lòng nhập giờ làm việc.',
        ]);
        
        $user = User::find(Auth::User()->id_user);
        $user->working_hours=$request->wh;
        $user->update();
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }
       

    public function qlkhachhang(){
        $user = DB::table('users')
        ->where('users.id_role', 2)
        ->select('users.*')
        ->paginate(5);
    
        return view('qlkhachhang', ['user' => $user]);
    }
    
    
    public function addqlkhachhang(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'password' => 'required|min:6',
'phonenumber'=>'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber',
    'email'=>'required|email|unique:users,email',
   
        ],[
            'name.required' => 'Không được bỏ trống tên.',
            'password.required' => 'Không được bỏ trống mật khẩu.',
            'name.max' => 'Tên quá dài phải <20 ký tự.',
            'password.min' => 'Mật khẩu quá ngắn phải >6 ký tự.',
            'phonenumber.required' => 'Không được bỏ trống số điện thoại.',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại.',
            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
           
        ]);
        
    
             $u=new User;
             $u->name=$request->name;
             $u->password=$request->password;
             $u->email=$request->email;
             $u->phonenumber=$request->phonenumber;
             $u->id_role=2;
        
            $u->save();
            return redirect()->back()->with('message', 'Thêm thành công');
    }
    public function xoaqlkhachhang(Request $request)
    {
        $request->validate([
            'id_user'=>'required|exists:users,id_user',
        ],[
        'id_user.required'=>'Hãy chọn người cần xóa',
        'id_user.exists'=>'Không tồn tại người cần xóa',

        ]);
        
        $s = User::find($request->id_user);
        $s->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function capnhatqlkhachhang(Request $request,$id)
        {
            $request->validate([
                'name' => 'required|max:20',
                'password' => 'nullable|min:6',
                'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber,' . $id. ',id_user',  
        'email' => 'required|email|unique:users,email,' . $id . ',id_user',
        'password'=>'nullable'
            ],[
                'name.required' => 'Không được bỏ trống tên.',
                'name.max' => 'Tên quá dài phải <20 ký tự.',
                'password.min' => 'Mật khẩu quá ngắn phải >6 ký tự.',
                'phonenumber.required' => 'Không được bỏ trống số điện thoại.',
                'phonenumber.regex' => 'Số điện thoại không hợp lệ',
                'phonenumber.unique' => 'Số điện thoại đã tồn tại.',
                'email.required' => 'Không được bỏ trống email.',
                'email.email' => 'Email không hợp lệ.',
                'email.unique' => 'Email đã tồn tại.',
            ]);
            
            if (empty($id)) {
                return redirect()->back()->with('message', 'ID không hợp lệ.');
            }
        
            $u = User::find($id);
        
            if (!$u) {
                return redirect()->back()->with('message', 'Không tìm thấy id .');
            }
    
            $user = User::find($id);
    
            $user->name=$request->name;
            if($request->password!=null){
                $user->password=$request->password;
    
            }
            $user->email=$request->email;
            $user->phonenumber=$request->phonenumber;
         
            $user->update();
            return redirect()->back()->with('message', 'Sửa thành công');
        }
        
         
    public function qlnhanvien(){
        $user = DB::table('users')
        ->where('users.id_role', 4)
        ->select('users.*')
        ->paginate(5);
    
    
        
        return view('qlnhanvien', ['user' => $user]);
    }
    public function addqlnhanvien(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'password' => 'required|min:6',
'phonenumber'=>'required|regex:/^0[0-9]{9}$/|unique:users,phonenumber',
    'email'=>'required|email|unique:users,email',
   
        ],[
            'name.required' => 'Không được bỏ trống tên.',
            'password.required' => 'Không được bỏ trống mật khẩu.',
            'name.max' => 'Tên quá dài phải <20 ký tự.',
            'password.min' => 'Mật khẩu quá ngắn phải >6 ký tự.',
            'phonenumber.required' => 'Không được bỏ trống số điện thoại.',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại.',
            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
           
        ]);
        
    
             $u=new User;
             $u->name=$request->name;
             $u->password=$request->password;
             $u->email=$request->email;
             $u->phonenumber=$request->phonenumber;
             $u->id_role=4;
        
            $u->save();
            return redirect()->back()->with('message', 'Thêm thành công');
    }
    public function finddoctor(Request $request){
        $specialist= DB::select('SELECT * from specialists');
        $user = DB::table('users')
        ->where('users.id_role', 3)
        ->select('users.*')
        ->paginate(5);


        $user = User::where('name', 'like', '%'.$request->dl.'%')->where('id_role',3)
        ->paginate(5); 
    
        if (!$user) {
            return view('qldoctor', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('qldoctor', ['user' => $user,'specialist' => $specialist]);
    }
    
    public function findnhanvien(Request $request){

    
        $user = User::where('name', 'like', '%'.$request->dl.'%')->where('id_role',4)
        ->paginate(5); 
        if (!$user) {
            return view('qlnhanvien', ['message' => 'không có nhanvien nào']);
        
        }
        return view('qlnhanvien', ['user' => $user]);
    }
    }   