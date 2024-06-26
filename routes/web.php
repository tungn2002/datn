<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\MedicineController;

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


///
Route::post('/editprofile', [UserController::class, 'editprofile']);

//

Route::get('/servicef', [ServiceController::class, 'servicef'])->name('servicef');


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

Route::get('/role', [RoleController::class, 'index'])->name('role-index');

Route::post('/addrole', [RoleController::class, 'store']);
Route::post('/xoarole', [RoleController::class, 'destroy'])->name('xoarole');
Route::post('capnhatrole/id={id}', [RoleController::class, 'update'])->name('capnhatrole');
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
