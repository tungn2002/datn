<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\User;

use App\Models\Service;

use DB;

class ClinicController extends Controller
{
  
    public function index(){
        $users = User::where('id_role', 3)->get(); // Lấy danh sách bác sĩ (id_role = 3)

        $services= DB::select('SELECT * from services');
        $hospitals= DB::select('SELECT * from hospitals');

        $clinic = Clinic::paginate(5); 
        if (!$clinic) {
            return view('clinic', ['message' => 'không có phòng nào']);
        }
        return view('clinic', ['clinic' => $clinic,'service' => $services,'hospital' => $hospitals,'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinicname' => 'required',
            'id_hospital' => 'required|exists:hospitals,id_hospital',
            'id_service' => 'required|exists:services,id_service',
            'id_user' => 'required|exists:users,id_user',
            


        ],[
            'clinicname.required' => 'Tên phòng là bắt buộc.',
          
            'id_hospital.required' => 'Bệnh viện là bắt buộc.',
            'id_hospital.exists' => 'Bệnh viện không tồn tại.',
            'id_service.required' => 'Dịch vụ là bắt buộc.',
            'id_service.exists' => 'Dịch vụ không tồn tại.',
            'id_user.required' => 'Bác sĩ là bắt buộc.',
            'id_user.exists' => 'Bác sĩ không tồn tại.',
   
        ]);
        // Kiểm tra chuyên khoa của bác sĩ
$user = User::find($request->id_user);
$sv = Service::find($request->id_service);

if ($user->id_specialist != $sv->id_specialist) { 
   return redirect()->back()->with('message', 'Bác sĩ không thuộc chuyên khoa của phòng khám này.');
}

             $clinic=new Clinic;
             $clinic->clinicname=$request->clinicname;

             $clinic->id_hospital=$request->id_hospital;
             $clinic->id_service=$request->id_service;
            
             $clinic->id_user=$request->id_user;

            $clinic->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_clinic'=>'required',
        ],[
        'id_clinic.required'=>'Hãy chọn phòng cần xóa',

        ]);

        $clinic = Clinic::find($request->id_clinic);
        $clinic->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'clinicname' => 'required',
            'id_hospital' => 'required|exists:hospitals,id_hospital',
            'id_service' => 'required|exists:services,id_service',
            'id_user' => 'required|exists:users,id_user',
            


        ],[
            'clinicname.required' => 'Tên phòng là bắt buộc.',
          
            'id_hospital.required' => 'Bệnh viện là bắt buộc.',
            'id_hospital.exists' => 'Bệnh viện không tồn tại.',
            'id_service.required' => 'Dịch vụ là bắt buộc.',
            'id_service.exists' => 'Dịch vụ không tồn tại.',
            'id_user.required' => 'Bác sĩ là bắt buộc.',
            'id_user.exists' => 'Bác sĩ không tồn tại.',
   
        ]);
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID phòng không hợp lệ.');
        }
    
        $clinic = Clinic::find($id);
    
        if (!$clinic) {
            return redirect()->back()->with('message', 'Không tìm thấy phòng.');
        }
        $user = User::find($request->id_user);
$sv = Service::find($request->id_service);

if ($user->id_specialist != $sv->id_specialist) { 
   return redirect()->back()->with('message', 'Bác sĩ không thuộc chuyên khoa của phòng khám này.');
}

        $clinic = Clinic::find($id);
        $clinic->clinicname=$request->clinicname;

        $clinic->id_hospital=$request->id_hospital;
        $clinic->id_service=$request->id_service;
        $clinic->id_user=$request->id_user;

        $clinic->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       

}
