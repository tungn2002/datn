<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;


use DB;

class ClinicController extends Controller
{
  
    public function index(){
        $services= DB::select('SELECT * from services');
        $hospitals= DB::select('SELECT * from hospitals');

        $clinic = Clinic::paginate(5); 
        if (!$clinic) {
            return view('clinic', ['message' => 'không có phòng nào']);
        }
        return view('clinic', ['clinic' => $clinic,'service' => $services,'hospital' => $hospitals]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'clinicname' => 'required',
            'id_hospital' => 'required|exists:hospitals,id_hospital',
            'id_service' => 'required|exists:services,id_service',

        ],[
            'clinicname.required' => 'Tên phòng là bắt buộc.',
          
            'id_hospital.required' => 'Bệnh viện là bắt buộc.',
            'id_hospital.exists' => 'Bệnh viện không tồn tại.',
            'id_service.required' => 'Dịch vụ là bắt buộc.',
            'id_service.exists' => 'Dịch vụ không tồn tại.',
   
        ]);
        

             $clinic=new Clinic;
             $clinic->clinicname=$request->clinicname;

             $clinic->id_hospital=$request->id_hospital;
             $clinic->id_service=$request->id_service;
            

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
        $request->validate([ 'servicename' => 'required',
         'detail' => 'required', 
         'price' => 'required|numeric|min:0', 
         'id_specialist' => 'required|exists:specialists,id_specialist',
          'image' => 'nullable|image',        
        ],[ 'servicename.required' => 'Tên dịch vụ là bắt buộc.', 
        'detail.required' => 'Chi tiết là bắt buộc.',
         'price.required' => 'Giá là bắt buộc.',
          'price.numeric' => 'Giá phải là một số.', 
          'price.min' => 'Giá phải lớn hơn 0.', 
          'id_specialist.required' => 'Chuyên khoa là bắt buộc.', 
          'id_specialist.exists' => 'Chuyên khoa không tồn tại.', 
          'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.', ]);
        
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID phòng không hợp lệ.');
        }
    
        $clinic = Clinic::find($id);
    
        if (!$clinic) {
            return redirect()->back()->with('message', 'Không tìm thấy phòng.');
        }

        $clinic = Clinic::find($id);
        $clinic->clinicname=$request->clinicname;

        $clinic->id_hospital=$request->id_hospital;
        $clinic->id_service=$request->id_service;
       
        $service->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       

}
