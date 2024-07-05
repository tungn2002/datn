<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Service;
use Carbon\Carbon;


use DB;

class AppointmentController extends Controller
{
  
   
    public function index2($id)
    {
        $clinics = Clinic::where('id_clinic', $id)->first();
        $appointments = Appointment::where('id_clinic', $id)->paginate(5); 
        return view('app', [
            'appointments' => $appointments,
            'clinics' => $clinics
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|date',
            'time' => 'required',
            'id_clinic' => 'required|exists:clinics,id_clinic',
        ], [
            'day.required' => 'Ngày khám là bắt buộc.',
            'day.date' => 'Ngày khám không hợp lệ.',
            'time.required' => 'Thời gian khám là bắt buộc.',
            'id_clinic.required' => 'Phòng khám là bắt buộc.',
            'id_clinic.exists' => 'Phòng khám không tồn tại.',
        ]);

   // Kiểm tra xung đột giờ
   $existingAppointment = Appointment::where('id_clinic', $request->id_clinic)
   ->where('day', $request->day)
   ->where('time', $request->time)
   ->exists();

if ($existingAppointment) {
   return redirect()->back()->with('message', 'Đã có lịch hẹn khác tại phòng khám này vào ngày và giờ đã chọn.');
}


        $app=new Appointment;
        $app->day=$request->day;

        $app->time=$request->time;
        $app->id_clinic=$request->id_clinic;
        $clinic = Clinic::where('id_clinic', $request->id_clinic)->first();
        $sv =Service::where('id_service', $clinic->id_service)->first();

        $seconds1 = strtotime($request->time) - strtotime('TODAY');
        $seconds2 = strtotime($sv->time) - strtotime('TODAY');
        $totalSeconds = $seconds1 + $seconds2;
        $totalTime = gmdate('H:i', $totalSeconds);

        $app->finishtime=$totalTime;

       $app->save();
        return redirect()->back()->with('message', 'Thêm lịch hẹn thành công');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id_appointment' => 'required',
        ], [
            'id_appointment.required' => 'Hãy chọn lịch hẹn cần xóa',
        ]);

        $appointment = Appointment::find($request->id_appointment);
        $appointment->delete();
        return redirect()->back()->with('message', 'Xóa lịch hẹn thành công');
    }

    public function update(Request $request, $id)
    {

        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'day' => 'required|date',
            'time' => 'required',
            'id_clinic' => 'required|exists:clinics,id_clinic',
        ], [
'day.required' => 'Ngày khám là bắt buộc.',
            'day.date' => 'Ngày khám không hợp lệ.',
            'time.required' => 'Thời gian khám là bắt buộc.',
         
            'id_clinic.required' => 'Phòng khám là bắt buộc.',
            'id_clinic.exists' => 'Phòng khám không tồn tại.',        ]);

        if (empty($id)) {
            return redirect()->back()->with('message', 'ID lịch hẹn không hợp lệ.');
        }

        $appointment = Appointment::find($id);
        if (!$appointment) {
            return redirect()->back()->with('message', 'Không tìm thấy lịch hẹn.');
        }

          // Kiểm tra xung đột giờ (ngoại trừ chính lịch hẹn đang sửa)
          $existingAppointment = Appointment::where('id_clinic', $request->id_clinic)
          ->where('day', $request->day)
          ->where('time', $request->time)
          ->where('id_appointment', '!=', $id) // Loại trừ lịch hẹn đang sửa
          ->exists();

      if ($existingAppointment) {
          return redirect()->back()->with('message', 'Đã có lịch hẹn khác tại phòng khám này vào ngày và giờ đã chọn.');
      }


      $appointment->day=$request->day;

      $appointment->time=$request->time;
      $appointment->id_clinic=$request->id_clinic;
      $clinic = Clinic::where('id_clinic', $request->id_clinic)->first();
      $sv =Service::where('id_service', $clinic->id_service)->first();

      $startTimeFormatted = Carbon::parse($request->time)->addHours($sv->time);

      $appointment->finishtime=$startTimeFormatted;
        $appointment->update();
        return redirect()->back()->with('message', 'Cập nhật lịch hẹn thành công');
    }
       
    public function findapp(Request $request,$id)
    {
        $clinics = Clinic::where('id_clinic', $id)->first();
        $appointments = Appointment::where('day', $request->dl)->where('id_clinic', $id)->paginate(5); 
        return view('app', [
            'appointments' => $appointments,
            'clinics' => $clinics
        ]);
    }

}
