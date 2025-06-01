<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord;
use App\Models\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB as FacadesDB;

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
            'prname' => 'required|max:20',
            'birthday' => 'required|date',

            'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:patientrecords,phonenumber',
            'gender' => 'required|in:male,female',
            'address' => 'required|max:30',
            'id_user' => 'required|exists:users,id_user',
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'prname.max' => 'Tên quá dài, chỉ được phép <20',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',

            'phonenumber.required' => 'Không được bỏ trống phonenumber',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại',

            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.max' => 'Địa chỉ quá dài, chỉ được phép <30.',
            'id_user.required' => 'Người dùng liên kết là bắt buộc.',
            'id_user.exists' => 'Người dùng liên kết không tồn tại.',
        ]);
        $userCount = FacadesDB::selectOne(
            'SELECT COUNT(id_user) as count FROM users WHERE id_user = :id_user AND id_role = 2',
            ['id_user' => $request->id_user]
        )->count;

        if ($userCount == 0) {
            return redirect()->back()->with('message', 'Người dùng này không có quyền thêm hồ sơ bệnh nhân.'); //nhầm id sang bs,nv
        }

        PatientRecord::create($request->all());

        return redirect()->back()->with('message', 'Thêm thành công');
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'id_pr' => 'required|exists:patientrecords,id_pr',
        ], [
            'id_pr.required' => 'Hãy chọn id cần xóa',
            'id_pr.exists' => 'Không tồn tại id cần xóa',
        ]);

        PatientRecord::destroy($request->id_pr);
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prname' => 'required|max:20',
            'birthday' => 'required|date',
            'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:patientrecords,phonenumber,' . $id . ',id_pr',
            'gender' => 'nullable|in:male,female',
            'address' => 'required|max:30',
            'id_user' => 'required|exists:users,id_user',
        ], [
            'prname.required' => 'Tên bệnh nhân là bắt buộc.',
            'prname.max' => 'Tên quá dài, chỉ được phép <20',

            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',


            'phonenumber.required' => 'Không được bỏ trống phonenumber',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại',

            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.max' => 'Địa chỉ quá dài, chỉ được phép <30.',
            'id_user.required' => 'Người dùng liên kết là bắt buộc.',
            'id_user.exists' => 'Người dùng liên kết không tồn tại.',
        ]);

        $userCount = FacadesDB::selectOne(
            'SELECT COUNT(*) as count FROM users WHERE id_user = :id_user AND id_role = 2',
            ['id_user' => $request->id_user]
        )->count;

        if ($userCount == 0) {
            return redirect()->back()->with('message', 'Người dùng này không có quyền sửa hồ sơ bệnh nhân.');
        }

        $pr = PatientRecord::findOrFail($id);
        $pr->prname = $request->prname;
        $pr->birthday = $request->birthday;
        $pr->phonenumber = $request->phonenumber;
        if ($request->gender != null) {
            $pr->gender = $request->gender;
        }
        $pr->address = $request->address;
        $pr->id_user = $request->id_user;
        $pr->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }


    //Người dùng hồ sơ


    public function themhoso()
    {
        return view('themhoso');
    }
    public function addhoso(Request $request)
    {
        $request->validate([
            'prname' => 'required|max:20',
            'birthday' => 'required|date',

            'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:patientrecords,phonenumber',
            'gender' => 'required|in:male,female',
            'address' => 'required|max:30',
        ], [
            'prname.required' => 'Không được bỏ trống tên.',
            'prname.max' => 'Tên quá dài, chỉ được phép <20',
            'birthday.required' => 'Không được bỏ trống ngày sinh.',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',

            'phonenumber.required' => 'Không được bỏ trống số điện thoại',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại',
            'gender.required' => 'Không được bỏ trống giới tính.',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Không được bỏ trống địa chỉ.',
            'address.max' => 'Địa chỉ quá dài, chỉ được phép <30.',

        ]);

        $pr = new PatientRecord;
        $pr->prname = $request->prname;
        $pr->birthday = $request->birthday;
        $pr->phonenumber = $request->phonenumber;
        $pr->gender = $request->gender;
        $pr->address = $request->address;
        $user = FacadesAuth::user();
        $id = $user->id_user;
        $pr->id_user = $id;

        $pr->save();

        return redirect()->route('profile2')->with('message', 'Thêm thành công');
    }




    public function capnhaths(Request $request)
    {
        $request->validate([
            'prname' => 'required|max:20',
            'birthday' => 'required|date',
            'phonenumber' => 'required|regex:/^0[0-9]{9}$/|unique:patientrecords,phonenumber,' . $request->id_pr . ',id_pr',
            'gender' => 'required|in:male,female',
            'address' => 'required|max:30',
        ], [
            'prname.required' => 'Không được bỏ trống tên',
            'prname.max' => 'Tên quá dài, chỉ được phép <20',

            'birthday.required' => 'Không được bỏ trống ngày sinh',
            'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',


            'phonenumber.required' => 'Không được bỏ trống số điện thoại',
            'phonenumber.regex' => 'Số điện thoại không hợp lệ',
            'phonenumber.unique' => 'Số điện thoại đã tồn tại',

            'gender.required' => 'Không được bỏ trống giới tính',
            'gender.in' => 'Giới tính phải là nam, nữ.',
            'address.required' => 'Không được bỏ trống địa chỉ',
            'address.max' => 'Địa chỉ quá dài, chỉ được phép <30.',
        ]);


        $pr = PatientRecord::findOrFail($request->id_pr);
        $pr->prname = $request->prname;
        $pr->birthday = $request->birthday;
        $pr->phonenumber = $request->phonenumber;
        $pr->gender = $request->gender;
        $pr->address = $request->address;
        $user = FacadesAuth::user();
        $id = $user->id_user;
        $pr->id_user = $id;
        $pr->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
    public function findpati(Request $request)
    {
        $users = User::where('id_role', 2) // Chỉ lấy người dùng có id_role = 2 // Chỉ lấy người dùng có hồ sơ bệnh nhân
            ->get();

        $patientRecords = PatientRecord::where('prname', 'like', '%' . $request->dl . '%')
            ->paginate(5);
        return view('pr', [
            'patientRecords' => $patientRecords,
            'users' => $users,
        ]);
    }
}
