<?php

namespace App\Http\Controllers;

use App\Models\Medicine;

use Illuminate\Http\Request;

class MedicineController extends Controller
{

    public function index()
    {
        $medicine = Medicine::paginate(5);

        return view('medicine', ['medicine' => $medicine]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicinename' => 'required|unique:medicines,medicinename',
            'detail' => 'required',
            'ingredient' => 'required',


        ], [
            'medicinname.required' => 'Không được bỏ trống tên',
            'detail.required' => 'Không được bỏ trống thông tin',
            'ingredient.required' => 'Không được bỏ trống thành phần',
            'medicinename.unique' => 'Tên này đã tồn tại',

        ]);

        $medicine = new Medicine;
        $medicine->medicinename = $request->medicinename;
        $medicine->detail = $request->detail;
        $medicine->ingredient = $request->ingredient;

        $medicine->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id_medicine' => 'required|exists:medicines,id_medicine',
        ], [
            'id_medicine.required' => 'Hãy chọn thuốc',
            'id_medicine.exists' => 'Không tồn tại thuốc',

        ]);


        $medicine = Medicine::find($request->id_medicine);
        $medicine->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'medicinename' => 'required|unique:medicines,medicinename,' . $id . ',id_medicine',
            'detail' => 'required',
            'ingredient' => 'required',


        ], [
            'medicine.required' => 'Không được bỏ trống tên',
            'detail.required' => 'Không được bỏ trống thông tin',
            'ingredient.required' => 'Không được bỏ trống thành phần',
            'medicinename.unique' => 'Tên này đã tồn tại',

        ]);

        if (empty($id)) {
            return redirect()->back()->with('message', 'ID thuốc không hợp lệ.');
        }

        // Tìm kiếm bệnh viện
        $medicine = Medicine::find($id);

        // Kiểm tra sự tồn tại của bệnh viện trong errors
        if (!$medicine) {
            return redirect()->back()->with('message', 'Không tìm thấy thuốc.');
        }
        $medicine = Medicine::find($id);
        $medicine->medicinename = $request->medicinename;
        $medicine->detail = $request->detail;
        $medicine->ingredient = $request->ingredient;
        $medicine->update();
        return redirect()->back()->with('message', 'Sửa thành công');
    }

    public function findmedi(Request $request)
    {
        $medicine = Medicine::where('medicinename', 'like', '%' . $request->dl . '%')
            ->paginate(5);
        if (!$medicine) {
            return view('medicine', ['message' => 'No medicine record found.']);
        }
        return view('medicine', ['medicine' => $medicine]);
    }
}
