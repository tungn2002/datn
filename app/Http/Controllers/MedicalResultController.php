<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalResult;
use App\Models\PatientRecord;
use App\Models\Appointment;
use App\Models\Prescription;


use DB;

class MedicalResultController extends Controller
{
  
    public function index() {
        //bỏ
        $patientRecords =PatientRecord::all();
       
        $appointments = DB::select('SELECT * FROM appointments WHERE id_appointment NOT IN (SELECT id_sch FROM medicalresults)');

        $prescriptions = DB::select('SELECT * FROM prescriptions WHERE id_pre NOT IN (SELECT id_prescription FROM medicalresults)');
//
        $medicalResults = MedicalResult::paginate(5);
        return view('mr', [
            'medicalResults' => $medicalResults,
            'patientRecords' => $patientRecords,
            'appointments' => $appointments,
            'prescriptions' => $prescriptions 
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'status' => 'required|in:chờ duyệt,chưa thanh toán,đã thanh toán, đã khám',
            'reason' => 'required',
            'detail' => 'required',
            'image' => 'required|image',
            'booking_date' => 'required|date',
            'id_mr' => 'required|exists:patientrecords,id_pr',
            'id_sch' => 'exists:appointments,id_appointment',
            'id_prescription' => 'nullable|exists:prescriptions,id_pre',
        ], [
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'reason.required' => 'Lý do là bắt buộc.',
            'detail.required' => 'Chi tiết là bắt buộc.',
            'booking_date.required' => 'Ngày khám là bắt buộc.',
            'booking_date.date' => 'Ngày khám không hợp lệ.',
            'id_mr.required' => 'Bệnh án là bắt buộc.',
            'id_mr.exists' => 'Bệnh án không tồn tại.',
            'id_sch.exists' => 'Lịch hẹn không tồn tại.',
            'id_prescription.exists' => 'Đơn thuốc không tồn tại.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.',
        ]);
        // Kiểm tra xem id_sch đã tồn tại trong bảng medicalresults chưa
        $existingResult = MedicalResult::where('id_sch', $request->id_sch)->exists();

        if ($existingResult) {
            return redirect()->back()->with('message', 'Mã lịch đã tồn tại trong kết quả khám bệnh khác.');
        }
 // Kiểm tra xem id_mr đã tồn tại trong bảng medicalresults chưa
 $existingResult = MedicalResult::where('id_prescription', $request->id_prescription)->exists();

 if ($existingResult) {
     return redirect()->back()->with('message', 'Mã thuốc đã tồn tại trong kết quả khám bệnh khác.');
 }

        $medicalResult=new MedicalResult;
        $medicalResult->status=$request->status;
        $medicalResult->reason=$request->reason;
        $medicalResult->detail=$request->detail;
        $medicalResult->booking_date=$request->booking_date;
        $medicalResult->id_mr=$request->id_mr;
        $medicalResult->id_sch=$request->id_sch;
        if($request->id_prescription!=null){
            $medicalResult->id_prescription=$request->id_prescription;

        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName); 
        $medicalResult->image = $imageName; 

        $medicalResult->save();
        return redirect()->back()->with('message', 'Thêm kết quả khám bệnh thành công');
    }
    public function destroy(Request $request)
    {
       
        $request->validate([
            'id_result'=>'required|exists:medicalresults,id_result',
        ],[
        'id_result.required'=>'Hãy chọn đơn cần xóa',
        'id_result.exists'=>'Không tồn tại đơn cần xóa',
        ]);
        $medicalResult = MedicalResult::find($request->id_result);
        $medicalResult->delete();
        return redirect()->back()->with('message', 'Xóa kết quả khám bệnh thành công');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:chờ duyệt,chưa thanh toán,đã thanh toán, đã khám',
            'reason' => 'required',
            'detail' => 'required',
            'image' => 'required|image',
            'booking_date' => 'required|date',
            'id_mr' => 'required|exists:patientrecords,id_pr',
            'id_sch' => 'exists:appointments,id_appointment',
            'id_prescription' => 'nullable|exists:prescriptions,id_pre',
        ], [
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'reason.required' => 'Lý do là bắt buộc.',
            'detail.required' => 'Chi tiết là bắt buộc.',
            'booking_date.required' => 'Ngày khám là bắt buộc.',
            'booking_date.date' => 'Ngày khám không hợp lệ.',
            'id_mr.required' => 'Bệnh án là bắt buộc.',
            'id_mr.exists' => 'Bệnh án không tồn tại.',
            'id_sch.exists' => 'Lịch hẹn không tồn tại.',
            'id_prescription.exists' => 'Đơn thuốc không tồn tại.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.',
        ]);
        $existingResult = MedicalResult::where('id_sch', $request->id_sch)
        ->where('id_result', '!=', $id) // Loại trừ bản ghi hiện tại
        ->exists();

if ($existingResult) {
return redirect()->back()->with('error', 'Mã lịch đã tồn tại trong kết quả khám bệnh khác.');
}
$existingResult = MedicalResult::where('id_prescription', $request->id_prescription)
->where('id_result', '!=', $id) // Loại trừ bản ghi hiện tại
->exists();

if ($existingResult) {
return redirect()->back()->with('error', 'Mã thuốc đã tồn tại trong kết quả khám bệnh khác.');
}

        $medicalResult = MedicalResult::find($id);
        if (!$medicalResult) {
            return redirect()->back()->with('error', 'Không tìm thấy kết quả khám bệnh.');
        }

        $medicalResult->status=$request->status;
        $medicalResult->reason=$request->reason;
        $medicalResult->detail=$request->detail;
        $medicalResult->booking_date=$request->booking_date;
        $medicalResult->id_mr=$request->id_mr;
        $medicalResult->id_sch=$request->id_sch;
        if($request->id_prescription!=null){
            $medicalResult->id_prescription=$request->id_prescription;

        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName); 
        $medicalResult->image = $imageName; 

        $medicalResult->update();
        return redirect()->back()->with('message', 'Cập nhật kết quả khám bệnh thành công');
    }

       
    public function findmr(Request $request) {
         //bỏ
        $patientRecords =PatientRecord::all();
      
        $appointments = DB::select('SELECT * FROM appointments WHERE id_appointment NOT IN (SELECT id_sch FROM medicalresults)');

        $prescriptions = DB::select('SELECT * FROM prescriptions WHERE id_pre NOT IN (SELECT id_prescription FROM medicalresults)');
//
        $medicalResults = MedicalResult::where('booking_date', $request->dl)
        ->paginate(5); 

        return view('mr', [
            'medicalResults' => $medicalResults,
            'patientRecords' => $patientRecords,
            'appointments' => $appointments,
            'prescriptions' => $prescriptions 
        ]);
    }

}
