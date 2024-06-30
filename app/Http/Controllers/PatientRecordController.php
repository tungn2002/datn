<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord;
use App\Models\User;
use DB;
use Auth;

class PatientRecordController extends Controller
{
    public function index()
    {
        $users = User::where('id_role', 2) // Chỉ lấy người dùng có id_role = 2 // Chỉ lấy người dùng có hồ sơ bệnh nhân
        ->get();
        $patientRecords = PatientRecord::paginate(5); 
        return view('pr', [
            'patientRecords' => $patientRecords,
            'users' => $users, 
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'prname' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'gender' => 'required|in:male,female', 
            'address' => 'required',
            'id_user' => 'required|exists:users,id_user', 
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phonenumber.required' => 'Số điện thoại là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ hoặc khác.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'id_user.required' => 'Người dùng liên kết là bắt buộc.',
            'id_user.exists' => 'Người dùng liên kết không tồn tại.',
        ]);
        $userCount = DB::selectOne(
            'SELECT COUNT(id_user) as count FROM users WHERE id_user = :id_user AND id_role = 2',
            ['id_user' => $request->id_user]
        )->count;
    
        if ($userCount == 0) {
            return redirect()->back()->with('message', 'Người dùng này không có quyền sửa hồ sơ bệnh nhân.');
        }
    
        PatientRecord::create($request->all());
        
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    public function destroy(Request $request)
    {
        $request->validate(['id_pr' => 'required']);
        PatientRecord::destroy($request->id_pr);
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prname' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'gender' => 'required|in:male,famale', 
            'address' => 'required',
            'id_user' => 'required|exists:users,id_user', 
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phonenumber.required' => 'Số điện thoại là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'id_user.required' => 'Người dùng liên kết là bắt buộc.',
            'id_user.exists' => 'Người dùng liên kết không tồn tại.',
        ]);

        $userCount = DB::selectOne(
            'SELECT COUNT(*) as count FROM users WHERE id_user = :id_user AND id_role = 2',
            ['id_user' => $request->id_user]
        )->count;
    
        if ($userCount == 0) {
            return redirect()->back()->with('message', 'Người dùng này không có quyền sửa hồ sơ bệnh nhân.');
        }
    
            $patientRecord = PatientRecord::findOrFail($id);
            $patientRecord->update($request->all());
        return redirect()->back()->with('message', 'Sửa thành công');
    }


    //nguoi dung them ho so

    
    public function themhoso()
    {
        return view('themhoso');
    }
    public function addhoso(Request $request)
    {
        $request->validate([
            'prname' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'gender' => 'required|in:male,female', 
            'address' => 'required',
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phonenumber.required' => 'Số điện thoại là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ hoặc khác.',
            'address.required' => 'Địa chỉ là bắt buộc.',
        ]);

        $pr=new PatientRecord;
        $pr->prname=$request->prname;
        $pr->birthday=$request->birthday;
        $pr->phonenumber=$request->phonenumber;
        $pr->gender=$request->gender;
        $pr->address=$request->address;
        $user = Auth::user();
        $id = $user->id_user;
        $pr->id_user=$id;

        $pr->save();
        
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    public function xoahoso(Request $request)
    {
        $request->validate(['id_pr' => 'required']);
        PatientRecord::destroy($request->id_pr);
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function suahoso(Request $request, $id)
    {
        $request->validate([
            'prname' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'gender' => 'required|in:male,famale', 
            'address' => 'required',
            'id_user' => 'required|exists:users,id_user', 
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phonenumber.required' => 'Số điện thoại là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'id_user.required' => 'Người dùng liên kết là bắt buộc.',
            'id_user.exists' => 'Người dùng liên kết không tồn tại.',
        ]);

    
            $pr = PatientRecord::findOrFail($id);
            $pr->prname=$request->prname;
            $pr->birthday=$request->birthday;
            $pr->phonenumber=$request->phonenumber;
            $pr->gender=$request->gender;
            $pr->address=$request->address;
            $user = Auth::user();
            $id = $user->id_user;
            $pr->id_user=$id;        
            $pr->update();
            return redirect()->back()->with('message', 'Sửa thành công');
    }


    public function xoahs(Request $request)
    {
        $request->validate(['id_pr' => 'required']);
        PatientRecord::destroy($request->id_pr);
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function capnhaths(Request $request)
    {
        $request->validate([
            'prname' => 'required',
            'birthday' => 'required|date',
            'phonenumber' => 'required',
            'gender' => 'required|in:male,famale', 
            'address' => 'required',
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
            'phonenumber.required' => 'Số điện thoại là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Địa chỉ là bắt buộc.',
        ]);

    
            $pr = PatientRecord::findOrFail($request->id_pr);
            $pr->prname=$request->prname;
            $pr->birthday=$request->birthday;
            $pr->phonenumber=$request->phonenumber;
            $pr->gender=$request->gender;
            $pr->address=$request->address;
            $user = Auth::user();
            $id = $user->id_user;
            $pr->id_user=$id;        
            $pr->update();
            return redirect()->back()->with('message', 'Sửa thành công');
    }
}
