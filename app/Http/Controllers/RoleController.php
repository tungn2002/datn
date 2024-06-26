<?php

namespace App\Http\Controllers;
use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index(){
        $role = Role::paginate(5); 
        if (!$role) {
            return view('role', ['message' => 'không có quyền nào nào']);
        }
        return view('role', ['role' => $role]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rolename'=>'required',
    
        ],[
        'rolename.required'=>'Không được bỏ trống tên',       

        ]);
        

             $role=new Role;
            $role->rolename=$request->rolename;
            $role->save();
            return redirect()->back()->with('message', 'Thêm thành công');
      
    
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_role'=>'required',
        ],[
        'id_role.required'=>'Hãy chọn quyền cần xóa',

        ]);
        
        $role = Role::find($request->id_role);
        $role->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'rolename'=>'required',
    
        ],[
        'rolename.required'=>'Không được bỏ trống tên',
        ]);
        
        if (empty($id)) {
            return redirect()->back()->with('message', 'ID quyền không hợp lệ.');
        }
    
        $role = Role::find($id);
    
        // Kiểm tra sự tồn tại của bệnh viện trong errors
        if (!$role) {
            return redirect()->back()->with('message', 'Không tìm thấy quyền.');
        }
        $role = Role::find($id);
        $role->rolename=$request->rolename;
        $role->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
       
}
