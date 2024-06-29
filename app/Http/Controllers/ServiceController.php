<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Appointment;
use App\Models\PatientRecord;
use App\Models\MedicalResult;
use Carbon\Carbon;
use Auth;



use DB;

class ServiceController extends Controller
{
    //Tìm dịch vụ
    public function servicef(){
        //trả về các id của phòng có lịch: sirvice phòng bác sĩ giá

        $clinics = DB::table('clinics')
        ->join('services', 'clinics.id_service', '=', 'services.id_service')
        ->join('users', 'clinics.id_user', '=', 'users.id_user')
        ->select('clinics.id_clinic', 'clinics.clinicname', 'services.servicename', 'services.price', 'services.image', 'users.name', 'users.avatar')
        ->paginate(5);

        if (!$clinics) {
            return view('find_service', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('find_service', ['clinic' => $clinics]);
    }

    //sau khi chọn phòng=>chọn day
    public function serviceff($id){
        $clinic1 = Clinic::find($id);
        $service =  Service::find($clinic1->id_service);
        $clinics = Appointment::where('id_clinic',$id)->get();

        if (!$clinics) {
            return view('find_service', ['message' => 'không có dịch vụ nào']);
        
        }

            // Extract unique dates from appointments
        $uniqueDates = $clinics->unique('day')->pluck('day');

        // Sort dates in ascending order (optional)
        $uniqueDates = $uniqueDates->sort();

        return view('find_service2', ['clinic1'=>$clinic1,'app' => $clinics,'service'=>$service,'uniqueDates'=>$uniqueDates]);
    }

    public function servicefff($id,$day){

        $clinic1 = Clinic::find($id);
        $service =  Service::find($clinic1->id_service);
        $app = Appointment::where('id_clinic',$id)->where('day',$day)->orderBy('time')->get();

        if (!$app) {
            return view('find_service', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('find_service3', ['clinic1'=>$clinic1,'app' => $app,'service'=>$service]);
    }


    
    public function serviceffff($id){
        $pr = PatientRecord::where('id_user',Auth::user()->id_user)->get();

        //$pr = PatientRecord::find();
       
        if (!$pr) {
            return view('find_service', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('find_service4', ['idapp'=>$id,'pr'=>$pr]);
    }

    
    public function addmrsv(Request $request) {
      
        $medicalResult=new MedicalResult;
        $medicalResult->reason=$request->reason;
        $medicalResult->status="chờ duyệt";
        $medicalResult->booking_date= Carbon::now();
        $medicalResult->id_mr=$request->id_mr;
        $medicalResult->id_sch=$request->id_sch;
        $medicalResult->detail=".";

        $medicalResult->save();

        return redirect()->route('trangchu');
       }
    public function index(){
        $specialist= DB::select('SELECT * from specialists');
        $service = Service::paginate(5); 
        if (!$service) {
            return view('service', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('service', ['service' => $service,'specialist' => $specialist]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicename' => 'required',
    'detail' => 'required',
    'price' => 'required|numeric|min:0',
    'id_specialist' => 'required|exists:specialists,id_specialist',
    'image' => 'required|image',
        ],[
            'servicename.required' => 'Tên dịch vụ là bắt buộc.',
            'detail.required' => 'Chi tiết là bắt buộc.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn 0.',
            'id_specialist.required' => 'Chuyên khoa là bắt buộc.',
            'id_specialist.exists' => 'Chuyên khoa không tồn tại.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'Hình ảnh phải là file ảnh hợp lệ.',
        ]);
        

             $service=new Service;
             $service->servicename=$request->servicename;
             $service->detail=$request->detail;
             $service->price=$request->price;
             $service->id_specialist=$request->id_specialist;

             $imageName = time() . '.' . $request->image->extension();
             $request->image->move(public_path('image'), $imageName); 
             $service->image = $imageName; 

            $service->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_service'=>'required',
        ],[
        'id_service.required'=>'Hãy chọn dịch vụ cần xóa',

        ]);
        
        $service = Service::find($request->id_service);
        $service->delete();
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
            return redirect()->back()->with('message', 'ID chuyên khoa không hợp lệ.');
        }
    
        $service = Service::find($id);
    
        if (!$service) {
            return redirect()->back()->with('message', 'Không tìm thấy dịch vụ.');
        }

        $service = Service::find($id);
        $service->servicename=$request->servicename;
        $service->detail=$request->detail;
        $service->price=$request->price;
        $service->id_specialist=$request->id_specialist;
        if($request->image!=null){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName); 
        $service->image = $imageName; 
        }
       

        $service->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       

}
