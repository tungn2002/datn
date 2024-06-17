<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'register']);

Route::post('/dangky', [UserController::class, 'store']);


//
Route::get('/forget', [UserController::class, 'forget'])->name('forget');;

Route::post('/quenmk', [UserController::class, 'quenmk']);
Route::get('/get-password/{user}/{token}', [UserController::class, 'getPass'])->name('user.getPass');

Route::post('/get-password/{user}/{token}', [UserController::class, 'postGetPass']);
