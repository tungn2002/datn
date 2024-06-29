<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrescriptionMedicine;


use DB;

class PMController extends Controller
{
  /*
    public function index(){
        $medicine= DB::select('SELECT * from medicines');
        $prescription= DB::select('SELECT * from prescriptions');

        $pm = PrescriptionMedicine::paginate(5); 
        if (!$pm) {
            return view('pm', ['message' => 'không có đơn nào']);
        }
        return view('pm', ['pm' => $pm,'medicine' => $medicine,'prescription' => $prescription]);
    }

    public function store(Request $request)
    {
     


        $request->validate([
            'information' => 'required',
            'id_medicine' => 'required|exists:medicines,id_medicine',
            'id_prescription' => 'required|exists:prescriptions,id_pre',

        ],[
            'information.required' => 'Phải nhập liều lượng thuốc.',
          
            'id_medicine.required' => 'Thuốc là bắt buộc.',
            'id_medicine.exists' => 'Thuốc không tồn tại.',
            'id_prescription.required' => 'Đơn là bắt buộc.',
            'id_prescription.exists' => 'Đơn không tồn tại.',
   
        ]);
        
        $prescriptionMedicineExists = PrescriptionMedicine::where('id_prescription', $request->id_prescription)
        ->where('id_medicine', $request->id_medicine)
        ->count();
    
        if ($prescriptionMedicineExists) {
            // Handle the error condition (record already exists)
            return redirect()->back()->with('message', 'Đã có ');
        }else{
            $pm=new PrescriptionMedicine;
             $pm->information=$request->information;

             $pm->id_medicine=$request->id_medicine;
             $pm->id_prescription=$request->id_prescription;
            

            $pm->save();
            return redirect()->back()->with('message', 'Thêm thành công');
        }
        
         
      
    
    }  
    public function destroy(Request $request)
    {
        $request->validate([
            'id_medicine' => 'required',
            'id_prescription' => 'required',
                ],[
                    'id_medicine.required' => 'Chọn đơn để xóa.',
                    'id_prescription.required' => 'Chọn đơn để xóa.',
           

        ]);

  
          // Thực hiện truy vấn xóa
    $deletedRows = PrescriptionMedicine::where('id_medicine', $request->id_medicine)
    ->where('id_prescription', $request->id_prescription)
    ->delete();

// Kiểm tra kết quả và phản hồi
if ($deletedRows > 0) {
return redirect()->back()->with('message', 'Xóa thành công.');
} else {
return redirect()->back()->with('message', 'Không tìm thấy bản ghi để xóa.');
}
    
    }
    public function update(Request $request)
    {
        $request->validate([
            'information' => 'required',
            'id_medicine' => 'required|exists:medicines,id_medicine',
            'id_prescription' => 'required|exists:prescriptions,id_pre',

        ],[
            'information.required' => 'Phải nhập liều lượng thuốc.',
          
            'id_medicine.required' => 'Thuốc là bắt buộc.',
            'id_medicine.exists' => 'Thuốc không tồn tại.',
            'id_prescription.required' => 'Đơn là bắt buộc.',
            'id_prescription.exists' => 'Đơn không tồn tại.',
   
        ]);

    
        $updatedRows = DB::update(
            'UPDATE prescription_medicines SET information = ? WHERE id_medicine = ? AND id_prescription = ?',
            [$request->information, $request->id_medicine, $request->id_prescription]
        );
    
        // Kiểm tra kết quả và phản hồi
        if ($updatedRows > 0) {
            return redirect()->back()->with('message', 'Cập nhật thành công.');
        } else {
            return redirect()->back()->with('message', 'Không tìm thấy bản ghi để cập nhật.');
        }
    }

    */

}
