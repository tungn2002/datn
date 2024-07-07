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
        $user= User::where('id_user', $clinics->id_user)->first();
        $appointments = Appointment::where('id_clinic', $id)
        ->orderBy('time', 'asc')
        ->paginate(5);
        return view('app', [
            'appointments' => $appointments,
            'clinics' => $clinics,'user'=>$user
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


        //tính time hoàn thành
        $clinic = Clinic::where('id_clinic', $request->id_clinic)->first();
        $sv =Service::where('id_service', $clinic->id_service)->first();

        $seconds1 = strtotime($request->time) - strtotime('TODAY');
        $seconds2 = strtotime($sv->time) - strtotime('TODAY');
        $totalSeconds = $seconds1 + $seconds2;
        $totalTime = gmdate('H:i', $totalSeconds);

        //
// Kiểm tra xem có xung đọt giờ khi cùng ngày cùng phòng  không
$existingAppointment = Appointment::where('day', $request->day)
->where('id_clinic', $request->id_clinic)
->where(function ($query) use ($request, $totalTime) {
    $query->where(function ($query) use ($request, $totalTime) {
        $query->whereBetween('time', [$request->time, $totalTime])
              ->orWhereBetween('finishtime', [$request->time, $totalTime]);
    })
    ->where(function ($query) use ($request, $totalTime) {
        $query->where('finishtime', '!=', $request->time)
              ->where('time', '!=', $totalTime);
    });
})
->exists();

if ($existingAppointment) {
return redirect()->back()->with(['message' => 'Lịch hẹn này trùng với một lịch hẹn khác trong khoảng thời gian đã chọn. Vui lòng chọn lại.']);
}

        $app=new Appointment;
        $app->day=$request->day;
        $app->time=$request->time;
        $app->id_clinic=$request->id_clinic;
       
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


        //tính time hoàn thành
        $clinic = Clinic::where('id_clinic', $request->id_clinic)->first();
        $sv =Service::where('id_service', $clinic->id_service)->first();

        $seconds1 = strtotime($request->time) - strtotime('TODAY');
        $seconds2 = strtotime($sv->time) - strtotime('TODAY');
        $totalSeconds = $seconds1 + $seconds2;
        $totalTime = gmdate('H:i', $totalSeconds);
          // Kiểm tra xung đột giờ (ngoại trừ chính lịch hẹn đang sửa)


$existingAppointment = Appointment::where('day', $request->day)
->where('id_clinic', $request->id_clinic)
->where('id_appointment', '!=', $id) 
->where(function ($query) use ($request, $totalTime) {
    $query->where(function ($query) use ($request, $totalTime) {
        $query->whereBetween('time', [$request->time, $totalTime])
              ->orWhereBetween('finishtime', [$request->time, $totalTime]);
    })
    ->where(function ($query) use ($request, $totalTime) {
        $query->where('finishtime', '!=', $request->time)
              ->where('time', '!=', $totalTime);
    });
})
->exists();

          
if ($existingAppointment) {
    return redirect()->back()->with(['message' => 'Lịch hẹn này trùng với một lịch hẹn khác trong khoảng thời gian đã chọn. Vui lòng chọn lại.']);
    }


      $appointment->day=$request->day;

      $appointment->time=$request->time;
      $appointment->id_clinic=$request->id_clinic;
     

      $appointment->finishtime=$totalTime;
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
