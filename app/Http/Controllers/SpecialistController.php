<?php

namespace App\Http\Controllers;
use App\Models\Specialist;

use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    
    public function index(){
        $specialist = Specialist::paginate(5); 
        if (!$specialist) {
            return view('specialist', ['message' => 'không có chuyên khoa nào']);
        }
        return view('specialist', ['specialist' => $specialist]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'spname'=>'required',
    
        ],[
        'spname.required'=>'Không được bỏ trống tên',       

        ]);
        

             $specialist=new Specialist;
            $specialist->spname=$request->spname;
            $specialist->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_specialist'=>'required',
        ],[
        'id_specialist.required'=>'Hãy chọn bệnh viện cần xóa',

        ]);
        
        $specialist = Specialist::find($request->id_specialist);
        $specialist->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'spname'=>'required',
    
        ],[
        'spname.required'=>'Không được bỏ trống tên',
        ]);
        
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID chuyên khoa không hợp lệ.');
        }
    
        $specialist = Specialist::find($id);
    
        // Kiểm tra sự tồn tại của bệnh viện trong errors
        if (!$specialist) {
            return redirect()->back()->with('message', 'Không tìm thấy chuyên khoa.');
        }
        $specialist = Specialist::find($id);
        $specialist->spname=$request->spname;
        $specialist->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
    public function findsp(Request $request){
        $specialist = Specialist::where('spname', 'like', '%'.$request->dl.'%')
        ->paginate(5); 
               if (!$specialist) {
            return view('specialist', ['message' => 'không có chuyên khoa nào']);
        }
        return view('specialist', ['specialist' => $specialist]);
    }

}
