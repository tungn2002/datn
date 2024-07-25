<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    
    public function index(){
        $prescription = Prescription::paginate(5); 
        return view('pre', ['prescription' => $prescription]);
    }
/*
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'diagnostic'=>'required',
            'day'=>'required|date',
    
        ],[
        'name.required'=>'Không được bỏ trống tên',
        'diagnostic.required'=>'Không được bỏ trống chuẩn đoán',
        'day.required'=>'Không được bỏ trống ngày',
        'day.date'=>'Ngày không hợp lệ',


        ]);
        
     
                $pre=new Prescription;
            $pre->name=$request->name;
            $pre->diagnostic=$request->diagnostic;
            $pre->day=$request->day;
            $pre->save();
            return redirect()->back()->with('message', 'Thêm thành công');
    
    }
            */
    public function destroy(Request $request)
    {
        $request->validate([
            'id_pre'=>'required',
        ],[
        'id_pre.required'=>'Hãy chọn đơn cần xóa',

        ]);
        
   
             $pre = Prescription::find($request->id_pre);
             $pre->name='chưa có';
                 $pre->diagnostic='chưa có';
                 $pre->update();

                 PrescriptionMedicine::where('id_prescription', $request->id_pre)->delete();

                return redirect()->back()->with('message', 'Xóa dữ liệu thành công');
    }/*
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'diagnostic'=>'required',
            'day'=>'required|date',
    
        ],[
        'name.required'=>'Không được bỏ trống tên',
        'diagnostic.required'=>'Không được bỏ trống chuẩn đoán',
        'day.required'=>'Không được bỏ trống ngày',
        'day.date'=>'Ngày không hợp lệ',


        ]);
        
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID không hợp lệ.');
        }
    
        // Tìm kiếm bệnh viện
        $pre = Prescription::find($id);
    
        // Kiểm tra sự tồn tại của bệnh viện trong errors
        if (!$pre) {
            return redirect()->back()->with('message', 'Không tìm thấy .');
        }
        $pre = Prescription::find($id);
        $pre->name=$request->name;
            $pre->diagnostic=$request->diagnostic;
            $pre->day=$request->day;
        $pre->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }*/
    public function findpre(Request $request){
        
        $prescription = Prescription::where('name', 'like', '%'.$request->dl.'%')
        ->paginate(5); 
        if (!$prescription) {
            return view('pre', ['message' => 'No record found.']);
        }
        return view('pre', ['prescription' => $prescription]);
    }
}
