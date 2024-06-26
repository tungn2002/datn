<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Specialist;
use DB;

class ServiceController extends Controller
{
    public function servicef(){
        $service = Service::paginate(5); 
        if (!$service) {
            return view('service', ['message' => 'không có dịch vụ nào']);
        
        }
        return view('find_service', ['service' => $service]);
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
