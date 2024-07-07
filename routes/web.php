<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PMController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ConsultController;

use App\Http\Controllers\OnlineCheckoutController;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\MedicalResultController;


//Đăng ký, đăng nhập, quên mật khẩu
Route::get('/login', [UserController::class, 'login'])->name('login'); //trang đăng nhập

Route::get('/register', [UserController::class, 'register'])->name('register'); //trang đăng ký

Route::post('/dangky', [UserController::class, 'store']);//gửi tt dk




//
Route::get('/forget', [UserController::class, 'forget'])->name('forget');;// trang quên mk

Route::post('/quenmk', [UserController::class, 'quenmk']);// gửi email
Route::get('/get-password/{user}/{token}', [UserController::class, 'getPass'])->name('user.getPass');//mở trang nhập pass

Route::post('/get-password/{user}/{token}', [UserController::class, 'postGetPass']);//update mk mới
//
Route::post('/dangnhap', [UserController::class, 'dangnhap']);//nút đăng nhập



//Trang chủ
Route::get('/trangchu', [UserController::class, 'trangchu'])->name('trangchu');

//thông tin tài khoản
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
//sửa thông tin tài khoản
Route::post('/editprofile', [UserController::class, 'editprofile']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    //Hồ sơ của khách hàng

    //pr
    Route::get('/themhoso', [PatientRecordController::class, 'themhoso'])->name('themhoso');

    Route::post('/addhoso', [PatientRecordController::class, 'addhoso']);
    
Route::post('capnhaths/', [PatientRecordController::class, 'capnhaths'])->name('capnhaths');
//dungchung
Route::post('/xoahs', [PatientRecordController::class, 'destroy'])->name('xoahs');





    //thông tin kết quả khám và hồ sơ bn
    Route::get('/profile2', [UserController::class, 'profile2'])->name('profile2');
    Route::get('/profile3', [UserController::class, 'profile3'])->name('profile3');
    Route::get('/profile32', [UserController::class, 'profile32'])->name('profile32');
    Route::get('/profile33', [UserController::class, 'profile33'])->name('profile33');
//xóa đon đặt khám
    Route::post('/xoaddk', [UserController::class, 'xoaddk'])->name('xoaddk');



//Đặt lịch khám 

Route::get('/servicef', [ServiceController::class, 'servicef'])->name('servicef');
Route::get('/serviceb', [ServiceController::class, 'serviceb'])->name('serviceb');

Route::get('/serviceff/{id}', [ServiceController::class, 'serviceff'])->name('serviceff');
Route::get('/servicefff/{id}/{day}', [ServiceController::class, 'servicefff'])->name('servicefff');
Route::get('/serviceffff/{id}', [ServiceController::class, 'serviceffff'])->name('serviceffff');

Route::get('/servicebf/{id}', [ServiceController::class, 'servicebf'])->name('servicebf');


//Route::get('/your-path/{id}', [YourController::class, 'yourMethod'])->name('your.route.name');
//đặt lịch khám 
Route::post('/addmrsv', [ServiceController::class, 'addmrsv'])->name('addmrsv');

//Nhân viên: 
Route::get('/empl', [UserController::class, 'empl'])->name('empl');//trang thông tin
Route::get('/empl_choduyet', [UserController::class, 'choduyet_empl'])->name('empl_choduyet'); //chờ duyệt
Route::get('/xacnhanduyet/{id}', [UserController::class, 'xacnhanduyet'])->name('xacnhanduyet');//xác nhận duyệt

Route::get('/empl_chothanhtoan', [UserController::class, 'chothanhtoan_empl'])->name('empl_chothanhtoan');//chờ thanh toán
Route::get('/xacnhanthanhtoan/{id}', [UserController::class, 'xacnhanthanhtoan'])->name('xacnhanthanhtoan');//xác nhận thanh toán

Route::get('/empl_dathanhtoan', [UserController::class, 'dathanhtoan_empl'])->name('empl_dathanhtoan');//trang đã thanh toán và đã khám
//tìm kiếm
Route::post('/findchoduyet', [UserController::class, 'findchoduyet'])->name('findchoduyet');

Route::post('/findchothanhtoan', [UserController::class, 'findchothanhtoan'])->name('findchothanhtoan');

//trò chuyện nhân viên
    
Route::get('/trochuyenempl', [ConsultController::class, 'trochuyenempl'])->name('trochuyenempl');
Route::get('/chatempl/{id}', [ConsultController::class, 'chatempl'])->name('chatempl');

Route::get('/trochuyenemplAjax', [ConsultController::class, 'trochuyenemplAjax'])->name('trochuyenemplAjax');

//nhanvine 
Route::get('/messages2/{conversation_id}', [ConsultController::class, 'getMessages2'])->name('messages2.get');
Route::post('/addmessage2', [ConsultController::class, 'addmessage2']);



//Bác sĩ 
Route::get('/doctor', [UserController::class, 'doctor'])->name('doctor');// thông tin cá nhân bác sĩ
Route::get('/lichlamviec', [UserController::class, 'lichlamviec'])->name('lichlamviec');//xem lịch làm việc

Route::get('/lichlamviecf/{date}', [UserController::class, 'lichlamviecf'])->name('lichlamviecf');//xem giờ làm việc
Route::get('/lichlamviecdetail/{id}', [UserController::class, 'lichlamviecdetail'])->name('lichlamviecdetail');//xem thông tin bệnh nhân
Route::post('/capnhatkq/{id}', [UserController::class, 'capnhatkq'])->name('capnhatkq');//cập nhật kết quả khám 

Route::get('/themdonthuoc/{id}', [UserController::class, 'themdonthuoc'])->name('themdonthuoc');// trang kê đơn cho bệnh nhân

//timthuoc
Route::post('/findthuoc', [UserController::class, 'findthuoc'])->name('findthuoc');


//cập nhật và xóa thuốc
Route::post('capnhatttdt/{id}', [UserController::class, 'capnhatttdt'])->name('capnhatttdt');
Route::post('capnhatdt/{id}', [UserController::class, 'capnhatdt'])->name('capnhatdt');

Route::post('/xoadtd', [UserController::class, 'xoadtd'])->name('xoadtd');


//admin người quản trị 
Route::get('/admin1', [UserController::class, 'admin1'])->name('admin1');
    //Quản lý bệnh viện
    Route::get('/hospital', [HospitalController::class, 'index'])->name('hospital-index');

    Route::post('/addhospital', [HospitalController::class, 'store']);
    Route::post('/xoahos', [HospitalController::class, 'destroy'])->name('xoahos');
    Route::post('capnhathos/id={id}', [HospitalController::class, 'update'])->name('capnhathos');

    //quản lý chuyên khoa

    Route::get('/specialist', [SpecialistController::class, 'index'])->name('specialist-index');

    Route::post('/addspecialist', [SpecialistController::class, 'store']);
    Route::post('/xoasp', [SpecialistController::class, 'destroy'])->name('xoasp');
    Route::post('capnhatsp/id={id}', [SpecialistController::class, 'update'])->name('capnhatsp');


//role
/*
Route::get('/role', [RoleController::class, 'index'])->name('role-index');

Route::post('/addrole', [RoleController::class, 'store']);
Route::post('/xoarole', [RoleController::class, 'destroy'])->name('xoarole');
Route::post('capnhatrole/id={id}', [RoleController::class, 'update'])->name('capnhatrole');
*/
//service

Route::get('/service', [ServiceController::class, 'index'])->name('service-index');

Route::post('/addservice', [ServiceController::class, 'store']);
Route::post('/xoaservice', [ServiceController::class, 'destroy'])->name('xoaservice');
Route::post('capnhatservice/id={id}', [ServiceController::class, 'update'])->name('capnhatservice');
//clinic

Route::get('/clinic', [ClinicController::class, 'index'])->name('clinic-index');

Route::post('/addclinic', [ClinicController::class, 'store']);
Route::post('/xoaclinic', [ClinicController::class, 'destroy'])->name('xoaclinic');
Route::post('capnhatclinic/id={id}', [ClinicController::class, 'update'])->name('capnhatclinic');

//medicine

Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine-index');

Route::post('/addmedicine', [MedicineController::class, 'store']);
Route::post('/xoamedicine', [MedicineController::class, 'destroy'])->name('xoamedicine');
Route::post('capnhatmedicine/id={id}', [MedicineController::class, 'update'])->name('capnhatmedicine');

/*
Route::get('/pm', [PMController::class, 'index'])->name('pm-index');

Route::post('/addpm', [PMController::class, 'store']);
Route::post('/xoapm', [PMController::class, 'destroy'])->name('xoapm');
Route::post('capnhatpm/id={id}', [PMController::class, 'update'])->name('capnhatpm');
*/
//pre 
Route::get('/pre', [PrescriptionController::class, 'index'])->name('pre-index');

//Route::post('/addpre', [PrescriptionController::class, 'store']);
Route::post('/xoapre', [PrescriptionController::class, 'destroy'])->name('xoapre');
//Route::post('capnhatpre/id={id}', [PrescriptionController::class, 'update'])->name('capnhatpre');

//user
Route::get('/user', [UserController::class, 'index2'])->name('user-index');

Route::post('/adduser', [UserController::class, 'store2']);
Route::post('/xoauser', [UserController::class, 'destroy'])->name('xoauser');
Route::post('capnhatuser/id={id}', [UserController::class, 'update'])->name('capnhatuser');


//appoi

Route::post('/addapp', [AppointmentController::class, 'store']);
Route::post('/xoaapp', [AppointmentController::class, 'destroy'])->name('xoaapp');
Route::post('capnhatapp/id={id}', [AppointmentController::class, 'update'])->name('capnhatapp');

Route::get('/app/{id}', [AppointmentController::class, 'index2'])->name('app-index2');


//pr ho so
Route::get('/pr', [PatientRecordController::class, 'index'])->name('pr-index');

Route::post('/addpr', [PatientRecordController::class, 'store']);
Route::post('/xoapr', [PatientRecordController::class, 'destroy'])->name('xoapr');
Route::post('capnhatpr/id={id}', [PatientRecordController::class, 'update'])->name('capnhatpr');



//kq
Route::get('/mr', [MedicalResultController::class, 'index'])->name('mr-index');

//Route::post('/addmr', [MedicalResultController::class, 'store']);
Route::post('/xoamr', [MedicalResultController::class, 'destroy'])->name('xoamr');
//Route::post('capnhatmr/id={id}', [MedicalResultController::class, 'update'])->name('capnhatmr');



// đơn tư vấn
Route::get('/consult', [ConsultController::class, 'index'])->name('consult-index');

Route::post('/xoaconsult', [ConsultController::class, 'destroy'])->name('xoaconsult');





//pdf:
Route::get('/pdf/{id}', [PdfController::class, 'pdf'])->name('pdf');
Route::get('/pdff/{id}', [PdfController::class, 'pdff'])->name('pdff');

//Trò chuyện của khách hàng
Route::get('/trochuyenuser', [ConsultController::class, 'trochuyenuser'])->name('trochuyenuser');

Route::post('/finddoctorchat', [ConsultController::class, 'finddoctorchat'])->name('finddoctorchat');

//thnahtoan
Route::post('/online-checkout', [OnlineCheckoutController::class, 'online_checkout'])->name('online-checkout');


Route::get('/xacnhanchat', [ConsultController::class, 'xacnhanchat'])->name('xacnhanchat');
Route::get('/chatuser', [ConsultController::class, 'chatuser'])->name('chatuser');
Route::get('/chatuser/{id}', [ConsultController::class, 'chatuser'])->name('chatuser');

//
Route::get('/messages/{conversation_id}', [ConsultController::class, 'getMessages'])->name('messages.get');
//
//cho all
Route::post('/addmessage', [ConsultController::class, 'addmessage']);



//bacsi
Route::get('/chatuser2/{id}', [ConsultController::class, 'chatuser2'])->name('chatuser2');

Route::get('/pdff2/{id}', [PdfController::class, 'pdff2'])->name('pdff2');

Route::get('/trochuyendoctor', [ConsultController::class, 'trochuyendoctor'])->name('trochuyendoctor');

Route::get('/chatdoctor/{id}', [ConsultController::class, 'chatdoctor'])->name('chatdoctor');
Route::get('/themdonthuoc2/{id}', [UserController::class, 'themdonthuoc2'])->name('themdonthuoc2');


//qldoctor

Route::get('/qldoctor', [UserController::class, 'qldoctor'])->name('qldoctor');

Route::post('/addqldoctor', [UserController::class, 'addqldoctor']);
Route::post('/xoaqldoctor', [UserController::class, 'xoaqldoctor'])->name('xoaqldoctor');
Route::post('capnhatqldoctor/id={id}', [UserController::class, 'capnhatqldoctor'])->name('capnhatqldoctor');

Route::post('/updatewh', [UserController::class, 'updatewh'])->name('updatewh');

//qlkh

Route::get('/qlkhachhang', [UserController::class, 'qlkhachhang'])->name('qlkhachhang');

Route::post('/addqlkhachhang', [UserController::class, 'addqlkhachhang']);
Route::post('/xoaqlkhachhang', [UserController::class, 'xoaqlkhachhang'])->name('xoaqlkhachhang');
Route::post('capnhatqlkhachhang/id={id}', [UserController::class, 'capnhatqlkhachhang'])->name('capnhatqlkhachhang');

//qlnv
Route::get('/qlnhanvien', [UserController::class, 'qlnhanvien'])->name('qlnhanvien');
Route::post('/addqlnhanvien', [UserController::class, 'addqlnhanvien']);


//tim kiem
Route::post('/timkiemsv', [ServiceController::class, 'timkiemsv'])->name('timkiemsv');
Route::post('/timkiemb', [ServiceController::class, 'timkiemb'])->name('timkiemb');

Route::post('/findsp', [SpecialistController::class, 'findsp'])->name('findsp');
Route::post('/findsv', [ServiceController::class, 'findsv'])->name('findsv');
Route::post('/findcli', [ClinicController::class, 'findcli'])->name('findcli');

Route::post('/findmedi', [MedicineController::class, 'findmedi'])->name('findmedi');
Route::post('/findpre', [PrescriptionController::class, 'findpre'])->name('findpre');
Route::post('/findapp/{id}', [AppointmentController::class, 'findapp'])->name('findapp');

Route::post('/findpati', [PatientRecordController::class, 'findpati'])->name('findpati');
Route::post('/findmr', [MedicalResultController::class, 'findmr'])->name('findmr');
Route::post('/finddoctor', [UserController::class, 'finddoctor'])->name('finddoctor');
Route::post('/findkhachhang', [UserController::class, 'findkhachhang'])->name('findkhachhang');
Route::post('/findnhanvien', [UserController::class, 'findnhanvien'])->name('findnhanvien');
Route::post('/findconsult', [UserController::class, 'findconsult'])->name('findconsult');

//
