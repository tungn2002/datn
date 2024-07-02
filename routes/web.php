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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/dangky', [UserController::class, 'store']);




//
Route::get('/forget', [UserController::class, 'forget'])->name('forget');;

Route::post('/quenmk', [UserController::class, 'quenmk']);
Route::get('/get-password/{user}/{token}', [UserController::class, 'getPass'])->name('user.getPass');

Route::post('/get-password/{user}/{token}', [UserController::class, 'postGetPass']);
//

Route::post('/dangnhap', [UserController::class, 'dangnhap']);


///
Route::get('/trangchu', [UserController::class, 'trangchu'])->name('trangchu');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile2', [UserController::class, 'profile2'])->name('profile2');
Route::get('/profile3', [UserController::class, 'profile3'])->name('profile3');
Route::get('/profile32', [UserController::class, 'profile32'])->name('profile32');
Route::get('/profile33', [UserController::class, 'profile33'])->name('profile33');

Route::post('/xoaddk', [UserController::class, 'xoaddk'])->name('xoaddk');


///
Route::post('/editprofile', [UserController::class, 'editprofile']);

//

Route::get('/servicef', [ServiceController::class, 'servicef'])->name('servicef');
Route::get('/serviceff/{id}', [ServiceController::class, 'serviceff'])->name('serviceff');
Route::get('/servicefff/{id}/{day}', [ServiceController::class, 'servicefff'])->name('servicefff');

Route::get('/serviceffff/{id}', [ServiceController::class, 'serviceffff'])->name('serviceffff');

Route::post('/addmrsv', [ServiceController::class, 'addmrsv'])->name('addmrsv');

//admin
Route::get('/admin1', [UserController::class, 'admin1'])->name('admin1');
//hos
Route::get('/hospital', [HospitalController::class, 'index'])->name('hospital-index');

Route::post('/addhospital', [HospitalController::class, 'store']);
Route::post('/xoahos', [HospitalController::class, 'destroy'])->name('xoahos');
Route::post('capnhathos/id={id}', [HospitalController::class, 'update'])->name('capnhathos');

//sp

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

Route::post('/addpre', [PrescriptionController::class, 'store']);
Route::post('/xoapre', [PrescriptionController::class, 'destroy'])->name('xoapre');
Route::post('capnhatpre/id={id}', [PrescriptionController::class, 'update'])->name('capnhatpre');

//user
Route::get('/user', [UserController::class, 'index2'])->name('user-index');

Route::post('/adduser', [UserController::class, 'store2']);
Route::post('/xoauser', [UserController::class, 'destroy'])->name('xoauser');
Route::post('capnhatuser/id={id}', [UserController::class, 'update'])->name('capnhatuser');


//appoi
Route::get('/app', [AppointmentController::class, 'index'])->name('app-index');

Route::post('/addapp', [AppointmentController::class, 'store']);
Route::post('/xoaapp', [AppointmentController::class, 'destroy'])->name('xoaapp');
Route::post('capnhatapp/id={id}', [AppointmentController::class, 'update'])->name('capnhatapp');


//pr ho so
Route::get('/pr', [PatientRecordController::class, 'index'])->name('pr-index');

Route::post('/addpr', [PatientRecordController::class, 'store']);
Route::post('/xoapr', [PatientRecordController::class, 'destroy'])->name('xoapr');
Route::post('capnhatpr/id={id}', [PatientRecordController::class, 'update'])->name('capnhatpr');



//kq
Route::get('/mr', [MedicalResultController::class, 'index'])->name('mr-index');

Route::post('/addmr', [MedicalResultController::class, 'store']);
Route::post('/xoamr', [MedicalResultController::class, 'destroy'])->name('xoamr');
Route::post('capnhatmr/id={id}', [MedicalResultController::class, 'update'])->name('capnhatmr');




//pr
Route::get('/themhoso', [PatientRecordController::class, 'themhoso'])->name('themhoso');

Route::post('/addhoso', [PatientRecordController::class, 'addhoso']);
Route::post('/xoahoso', [PatientRecordController::class, 'destroy'])->name('xoahoso');
Route::post('capnhathoso/id={id}', [PatientRecordController::class, 'update'])->name('capnhathoso');

//user
Route::post('capnhaths/', [PatientRecordController::class, 'capnhaths'])->name('capnhaths');
Route::post('/xoahs', [PatientRecordController::class, 'destroy'])->name('xoahs');

//employ
Route::get('/empl', [UserController::class, 'empl'])->name('empl');
Route::get('/empl_choduyet', [UserController::class, 'choduyet_empl'])->name('empl_choduyet');
Route::get('/xacnhanduyet/{id}', [UserController::class, 'xacnhanduyet'])->name('xacnhanduyet');

Route::get('/empl_chothanhtoan', [UserController::class, 'chothanhtoan_empl'])->name('empl_chothanhtoan');
Route::get('/xacnhanthanhtoan/{id}', [UserController::class, 'xacnhanthanhtoan'])->name('xacnhanthanhtoan');

Route::get('/empl_dathanhtoan', [UserController::class, 'dathanhtoan_empl'])->name('empl_dathanhtoan');

//doctor
Route::get('/doctor', [UserController::class, 'doctor'])->name('doctor');
Route::get('/lichlamviec', [UserController::class, 'lichlamviec'])->name('lichlamviec');

Route::get('/lichlamviecf/{date}', [UserController::class, 'lichlamviecf'])->name('lichlamviecf');
Route::get('/lichlamviecdetail/{id}', [UserController::class, 'lichlamviecdetail'])->name('lichlamviecdetail');
Route::post('/capnhatkq/{id}', [UserController::class, 'capnhatkq'])->name('capnhatkq');

Route::get('/themdonthuoc/{id}', [UserController::class, 'themdonthuoc'])->name('themdonthuoc');


Route::post('capnhatttdt/{id}', [UserController::class, 'capnhatttdt'])->name('capnhatttdt');
Route::post('capnhatdt/{id}', [UserController::class, 'capnhatdt'])->name('capnhatdt');

Route::post('/xoadtd', [UserController::class, 'xoadtd'])->name('xoadtd');



//pdf:
Route::get('/pdf/{id}', [PdfController::class, 'pdf'])->name('pdf');
Route::get('/pdff/{id}', [PdfController::class, 'pdff'])->name('pdff');

//tro chuyen
Route::get('/trochuyenuser', [ConsultController::class, 'trochuyenuser'])->name('trochuyenuser');


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


Route::get('/trochuyenempl', [ConsultController::class, 'trochuyenempl'])->name('trochuyenempl');
Route::get('/chatempl/{id}', [ConsultController::class, 'chatempl'])->name('chatempl');

Route::get('/trochuyenemplAjax', [ConsultController::class, 'trochuyenemplAjax'])->name('trochuyenemplAjax');

//nhanvine 
Route::get('/messages2/{conversation_id}', [ConsultController::class, 'getMessages2'])->name('messages2.get');
Route::post('/addmessage2', [ConsultController::class, 'addmessage2']);



//bacsi
Route::get('/chatuser2/{id}', [ConsultController::class, 'chatuser2'])->name('chatuser2');

Route::get('/pdff2/{id}', [PdfController::class, 'pdff2'])->name('pdff2');

Route::get('/trochuyendoctor', [ConsultController::class, 'trochuyendoctor'])->name('trochuyendoctor');

Route::get('/chatdoctor/{id}', [ConsultController::class, 'chatdoctor'])->name('chatdoctor');
Route::get('/themdonthuoc2/{id}', [UserController::class, 'themdonthuoc2'])->name('themdonthuoc2');
