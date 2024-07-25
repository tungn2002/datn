<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Appointment;
use App\Models\PatientRecord;
use App\Models\MedicalResult;
use App\Models\Hospital;

use Carbon\Carbon;
use Auth;



use DB;

class ServiceController extends Controller
{
    //Tìm dịch vụ
    public function servicef(){
       
        $clinics = DB::table('clinics')
        ->join('services', 'clinics.id_service', '=', 'services.id_service')
        ->select('clinics.id_clinic', 'clinics.clinicname', 'services.servicename', 'services.price', 'services.image')
        ->paginate(6);
        $firstPost = Hospital::first();

        return view('find_service', ['clinic' => $clinics,'hos'=>  $firstPost]);
    }
    //tìm bác sĩ
    public function serviceb(){
      
        $clinics = DB::table('users')
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->where('id_role',3)
        ->select('specialists.spname','users.name', 'users.avatar','users.id_user')
        ->paginate(4);

        $firstPost = Hospital::first();

        return view('find_serviceb', ['clinic' => $clinics,'hos'=>  $firstPost]);
    }
    //thông tin bác sĩ
    public function servicebf($id){
      
        $doctor = DB::table('users')
        ->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
        ->where('id_user',$id)
        ->select('specialists.spname','users.name', 'users.avatar')
        ->first();

        $clinics = DB::table('clinics')
        ->join('services', 'clinics.id_service', '=', 'services.id_service')
        ->where('clinics.id_user',$id)
        ->select('clinics.id_clinic', 'clinics.clinicname', 'services.servicename', 'services.price', 'services.image')
        ->paginate(2);
        return view('find_serviceb2', ['doctor'=>$doctor,'clinic'=>$clinics]);
    }

    //sau khi chọn phòng=>chọn day
    public function serviceff($id){
        $clinic1 = Clinic::find($id);
        $service =  Service::find($clinic1->id_service);
        $currentDate = Carbon::now(); // Lấy ngày hiện tại
        $nextDay = $currentDate->addDays(1);
        $clinics = Appointment::where('id_clinic',$id)//
        ->whereDate('day', '>', $nextDay ->toDateString())
        ->get();

        if (!$clinics) {//dk kchay
            return redirect()->route('servicef')->with('message', 'không có dịch vụ nào');
        
        }
//lấy ds ngày và sắp xếp
        $uniqueDates = $clinics->unique('day')->pluck('day');

        $uniqueDates = $uniqueDates->sort();

        return view('find_service2', ['clinic1'=>$clinic1,'app' => $clinics,'service'=>$service,'uniqueDates'=>$uniqueDates]);
    }
//chọn giờ
    public function servicefff($id,$day){
        if($id==null||$day==null){
            return view('find_service', ['message' => 'không có dịch vụ nào']);
        }
        
        $clinic1 = Clinic::find($id);
        $service =  Service::find($clinic1->id_service);
        $app = Appointment::where('id_clinic', $id)//left lấy ra toàn bộ cả app ko có trong mr. bảng có null sẽ là chưa có ai đặt
        ->where('day', $day)
        ->leftJoin('medicalresults', 'medicalresults.id_sch', '=', 'appointments.id_appointment')
        ->whereNull('medicalresults.id_sch')
        ->orderBy('time')
        ->get();

        if (!$app) {
            return redirect()->route('servicef')->with('message', 'không có dịch vụ nào');

        }
        return view('find_service3', ['clinic1'=>$clinic1,'app' => $app,'service'=>$service]);
    }

//Chọn hồ sơ và nhập lý do khám
    
    public function serviceffff($id){
            if(MedicalResult::where('id_sch', $id)->exists()){
                return redirect()->route('servicef')->with('message', 'Đã có người đặt');

            }
        
        $pr = PatientRecord::where('id_user',Auth::user()->id_user)->get();

        //$pr = PatientRecord::find();
       
        if (!$pr) {
            return redirect()->route('servicef')->with('message', 'không có dịch vụ nào');

        }
        return view('find_service4', ['idapp'=>$id,'pr'=>$pr]);//id lịch và hồ sơ
    }

    //lưu đơn
    public function addmrsv(Request $request) {
        if(MedicalResult::where('id_sch', $request->id_sch)->exists()){
            return redirect()->route('servicef')->with('message', 'Đã có người đặt');
        }
        
        $request->validate([
            'id_mr' => 'required',
       
        ],[
            'id_mr.required' => 'Phải chọn hồ sơ muốn khám.',
          
        ]);
        
        $medicalResult=new MedicalResult;
        if($request->reason!=null){
            $medicalResult->reason=$request->reason;
        }else{
            $medicalResult->reason="Không có";
        }
        $medicalResult->status="chờ duyệt";
        $medicalResult->booking_date= Carbon::now();
        $medicalResult->id_mr=$request->id_mr;
        $medicalResult->id_sch=$request->id_sch;
        $medicalResult->detail=".";
        $medicalResult->save();

        return redirect()->route('trangchu')->with('message', 'Đặt thành công!');
       }
    public function index(){
        $service = Service::paginate(5); 
       
        return view('service', ['service' => $service]);
    }
  //tìm kiếm dịch vụ
  public function timkiemsv(Request $request){
    
    $clinics = DB::table('clinics')
    ->join('services', 'clinics.id_service', '=', 'services.id_service')
    ->where('services.servicename', 'like','%'. $request->dl.'%')
    ->select('clinics.id_clinic', 'clinics.clinicname', 'services.servicename', 'services.price', 'services.image')
    ->paginate(6);


$firstPost = Hospital::first();


//

return view('find_service', ['clinic' => $clinics,'hos'=>  $firstPost]);
}
public function timkiemb(Request $request){

$clinics = DB::table('users')
->join('specialists', 'users.id_specialist', '=', 'specialists.id_specialist')
->where('id_role',3)
->where('users.name', 'like','%'. $request->dl.'%')

->select('specialists.spname','users.name', 'users.avatar','users.id_user')
->paginate(4);

$firstPost = Hospital::first();


//

if (!$clinics) {
return view('find_serviceb', ['message' => 'không có dịch vụ nào']);

}
return view('find_serviceb', ['clinic' => $clinics,'hos'=>  $firstPost]);
}

//admin quản lý dịch vụ
    public function store(Request $request)
    {
        $request->validate([
            'servicename' => 'required|unique:services,servicename',
    'detail' => 'required',
    'price' => 'required|numeric|min:0',
    'time' => 'required|date_format:H:i',
    'image' => 'required|image',
        ],[
            'servicename.required' => 'Không được bỏ trống tên.',
            'detail.required' => 'Không được bỏ trống chi tiết.',
            'price.required' => 'Không được bỏ trống giá',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn 0.',
            'time.required' => 'Không được bỏ trống thời gian khám.',
            'time.date_format' => 'Thời gian khám phải nhập: giờ:phút',

            'image.required' => 'Không được bỏ trống tên hình ảnh',
            'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.',
            'servicename.unique' => 'Tên này đã tồn tại',

        ]);
        

             $service=new Service;
             $service->servicename=$request->servicename;
             $service->detail=$request->detail;
             $service->price=$request->price;
             $imageName = time() . '.' . $request->image->extension();
             $request->image->move(public_path('image'), $imageName); 
             $service->image = $imageName; 
             $service->time = $request->time; 

            $service->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_service'=>'required|exists:services,id_service',
        ],[
        'id_service.required'=>'Hãy chọn dịch vụ cần xóa',
        'id_service.exists'=>'Không tồn tại dịch vụ cần xóa',

        ]);
        
        $service = Service::find($request->id_service);
        $service->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function update(Request $request,$id)
    {
        $request->validate([ 'servicename' => 'required|unique:services,servicename,' . $id . ',id_service',
         'detail' => 'required',      'time' => 'required|date_format:H:i',
         'price' => 'required|numeric|min:0', 
          'image' => 'nullable|image',        
        ],[ 'servicename.required' => 'Không được bỏ trống tên', 
        'detail.required' => 'Không được bỏ trống chi tiết',
         'price.required' => 'Không được bỏ trống giá',
          'price.numeric' => 'Giá phải là một số.', 
          'price.min' => 'Giá phải lớn hơn 0.', 
          'time.required' => 'Không được bỏ trống thời gian khám',
          'time.date_format' => 'Thời gian khám phải nhập: giờ:phút',
          'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.', 'servicename.unique' => 'Tên này đã tồn tại',
 ]);
         
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID dịch vụ không hợp lệ.');
        }
    
        $service = Service::find($id);
    
        if (!$service) {
            return redirect()->back()->with('message', 'Không tìm thấy dịch vụ.');
        }

        $service = Service::find($id);
        $service->servicename=$request->servicename;
        $service->detail=$request->detail;
        $service->price=$request->price;
        if($request->image!=null){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName); 
        $service->image = $imageName; 
        }
        $service->time = $request->time; 

       

        $service->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
     

    public function findsv(Request $request){

        $service = Service::where('servicename', 'like', '%'.$request->dl.'%')
        ->paginate(5); 

        if (!$service) {
            return view('service', ['message' => 'không có dịch vụ nào']);
        }
        return view('service', ['service' => $service]);
    }
}
