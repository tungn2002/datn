<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Hospital;

use App\Models\Service;

use DB;

class ClinicController extends Controller
{
  
    public function index(){

        $clinicUserIds = Clinic::select('id_user')->get()->pluck('id_user');//trả về mảng chỉ chứa các giá trị id_user

        //không lấy bác sĩ đã có phòng
        $users = User::where('id_role', 3)
        ->whereNotIn('id_user', $clinicUserIds)
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
    ->select('users.*', 'specialists.*') 
        ->get();
        $services= DB::select('SELECT * from services');

        $clinic = Clinic::paginate(5); 

        return view('clinic', ['clinic' => $clinic,'service' => $services,'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinicname' => 'required|unique:clinics,clinicname',
            'id_service' => 'required|exists:services,id_service',
            'id_user' => 'required|exists:users,id_user|unique:clinics,id_user',
            
        ],[
            'clinicname.required' => 'Không được bỏ trống tên phòng.',
    
            'id_service.required' => 'Không được bỏ trống dịch vụ.',
            'id_service.exists' => 'Dịch vụ không tồn tại.',
            'id_user.required' => 'Không được bỏ trống bác sĩ.',
            'id_user.exists' => 'Bác sĩ không tồn tại.',
            'id_user.unique' => 'Bác sĩ đã có phòng.',
            'clinicname.unique' => 'Tên này đã tồn tại',

        ]);
        // kiểm tra xem có đúng là bác sĩ không
        $userExists = User::where('id_user',$request->id_user)->where('id_role', 3)->exists();
        if(!$userExists){
            return redirect()->back()->with('message', 'Không tồn tại id bác sĩ');
        }
        //kiểm tra xem bệnh viện đã có thông tin chưa
        if(Hospital::count()<1){
            return redirect()->back()->with('message', 'Chưa điền thông tin bệnh viện');
        }

        $hos=Hospital::all()->first();

             $clinic=new Clinic;
             $clinic->clinicname=$request->clinicname;

             $clinic->id_service=$request->id_service;
             $clinic->id_hospital=$hos->id_hospital;
             $clinic->id_user=$request->id_user;

            $clinic->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_clinic'=>'required|exists:clinics,id_clinic',
        ],[
        'id_clinic.required'=>'Hãy chọn phòng cần xóa',
        'id_clinic.exists'=>'Không tồn tại phòng cần xóa',

        ]);

        $clinic = Clinic::find($request->id_clinic);
        $clinic->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'clinicname' => 'required|unique:clinics,clinicname,' . $id . ',id_clinic',
            'id_service' => 'required|exists:services,id_service',
            'id_user' => 'nullable|exists:users,id_user|unique:clinics,id_user,' . $id . ',id_user',                 

        ],[
            'clinicname.required' => 'Không được bỏ trống tên phòng.',
            'id_service.required' => 'Không được bỏ trống dịch vụ.',
            'id_service.exists' => 'Dịch vụ không tồn tại.',
            'id_user.exists' => 'Bác sĩ không tồn tại.',
            'id_user.unique' => 'Bác sĩ đã có phòng.',
            'clinicname.unique' => 'Tên này đã tồn tại',

        ]);
if( $request->id_user!=null){
    // kiểm tra xem có đúng là bác sĩ không
 $userExists = User::where('id_user',$request->id_user)->where('id_role', 3)->exists();
 if(!$userExists){
     return redirect()->back()->with('message', 'Không tồn tại id bác sĩ');
 }
}
 

 //kiểm tra xem bệnh viện đã có thông tin chưa
 if(Hospital::count()<1){
     return redirect()->back()->with('message', 'Chưa điền thông tin bệnh viện');
 }


        if (empty($id)) {
            return redirect()->back()->with('message', 'ID phòng không hợp lệ.');
        }
    
        $clinic = Clinic::find($id);
    
        if (!$clinic) {
            return redirect()->back()->with('message', 'Không tìm thấy phòng.');
        }
        $user = User::find($request->id_user);
$sv = Service::find($request->id_service);
$hos=Hospital::all()->first();

        $clinic = Clinic::find($id);
        $clinic->clinicname=$request->clinicname;
        $clinic->id_hospital=$hos->id_hospital;

        $clinic->id_service=$request->id_service;
        if($request->id_user!=null){
           $clinic->id_user=$request->id_user;

        }
        $clinic->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       
    public function findcli(Request $request){
        $users = User::where('id_role', 3)->get(); // Lấy danh sách bác sĩ (id_role = 3)

        $services= DB::select('SELECT * from services');

        $clinic = Clinic::where('clinicname', 'like', '%'.$request->dl.'%')
        ->paginate(5); 
        if (!$clinic) {
            return view('clinic', ['message' => 'không có phòng nào']);
        }
        return view('clinic', ['clinic' => $clinic,'service' => $services,'users' => $users]);
    }
}
