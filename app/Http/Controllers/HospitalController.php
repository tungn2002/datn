<?php

namespace App\Http\Controllers;
use App\Models\Hospital;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    
    public function index(){
        $hospital = Hospital::paginate(3); 
        return view('hospital', ['hospital' => $hospital]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospitalname'=>'required|max:44',
            'address'=>'required|max:35',
    
        ],[
        'hospitalname.required'=>'Không được bỏ trống tên',
        'address.required'=>'Không được bỏ trống địa chỉ',
        'hospitalname.max'=>'Tên quá dài, chỉ cho phép <44',
        'address.max'=>'Địa chỉ quá dài, chỉ cho phép <30',
        ]);
        //chỉ cho chứa 1 bệnh viện
        $existingHospitalCount = Hospital::count();

        if ($existingHospitalCount < 1) {
                $hospital=new Hospital;
            $hospital->hospitalname=$request->hospitalname;
            $hospital->address=$request->address;
            $hospital->save();
            return redirect()->back()->with('message', 'Thêm thành công');
        }else{

            return redirect()->back()->with('message', 'Đã có bệnh viện');
        }
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_hospital'=>'required|exists:hospitals,id_hospital',
        ],[
        'id_hospital.required'=>'Hãy chọn bệnh viện cần xóa',
        'id_hospital.exists'=>'Không tồn tại bệnh viện cần xóa',
        ]);
        
        $existingHospitalCount = Hospital::count();

        if ($existingHospitalCount > 1) {
             $hospital = Hospital::find($request->id_hospital);
        $hospital->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
        }
        return redirect()->back()->with('message', 'Chỉ còn 1 bản ghi');

    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'hospitalname'=>'required|max:44',
            'address'=>'required|max:35',
    
        ],[
            'hospitalname.required'=>'Không được bỏ trống tên',
            'address.required'=>'Không được bỏ trống địa chỉ',
            'hospitalname.max'=>'Tên quá dài, chỉ cho phép <44',
            'address.max'=>'Địa chỉ quá dài, chỉ cho phép <30',
        ]);
        
        //nếu không có id
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID bệnh viện không hợp lệ.');
        }
    
        $hospital = Hospital::find($id);
    
        // Kiểm tra sự tồn tại của bệnh viện
        if (!$hospital) {
            return redirect()->back()->with('message', 'Không tìm thấy bệnh viện.');
        }
        $hospital = Hospital::find($id);
        $hospital->hospitalname=$request->hospitalname;
        $hospital->address=$request->address;
        $hospital->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       
}
