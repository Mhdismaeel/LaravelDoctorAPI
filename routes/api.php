<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:api']], function() {
Route::get('Logout',[App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('CurrentLoginUser',[App\Http\Controllers\User\UserController::class,'CurrentUser']);
Route::post('StoreBooking',[App\Http\Controllers\BookingController\BookingController::class,'store']);
Route::post('UpdateBooking/{id}',[App\Http\Controllers\BookingController\BookingController::class,'update']);
Route::get('GetBookings',[App\Http\Controllers\BookingController\BookingController::class,'index']);

});


Route::group(['middleware' => ['auth:api','check']], function () {
 Route::post('Register',[App\Http\Controllers\Auth\RegisterController::class, 'create']);

 });


 Route::middleware(['auth:api', 'create'])->group(function () {
    Route::post('StoreDoctor',[App\Http\Controllers\DoctorsController\DoctorController::class,'store']);
    Route::post('StoreType',[App\Http\Controllers\TypeController\TypeController::class,'store']);

 });


 Route::middleware(['auth:api', 'update'])->group(function () {
    Route::post('UpdateDoctor/{id}',[App\Http\Controllers\DoctorsController\DoctorController::class,'update']);
    Route::post('UpdateType/{id}',[App\Http\Controllers\TypeController\TypeController::class,'update']);
    Route::get('ChangeToDone/{id}',[App\Http\Controllers\BookingController\BookingController::class,'ChangeToDone']);
    Route::get('ChangeToRejected/{id}',[App\Http\Controllers\BookingController\BookingController::class,'ChangeToReject']);
    Route::get('ChangeToAccepted/{id}',[App\Http\Controllers\BookingController\BookingController::class,'ChangeToAccespt']);

 });

 Route::middleware(['auth:api', 'delete'])->group(function () {
    Route::get('DeleteDoctor/{id}',[App\Http\Controllers\DoctorsController\DoctorController::class,'destroy']);
    Route::get('DeleteType/{id}',[App\Http\Controllers\TypeController\TypeController::class,'destroy']);
    Route::get('DeleteBooking/{id}',[App\Http\Controllers\BookingController\BookingController::class,'destroy']);

 });




//***************No Auth***************** */
Route::get('GetDoctors',[App\Http\Controllers\DoctorsController\DoctorController::class,'index']);
Route::get('GetDoctorId/{id}',[App\Http\Controllers\DoctorsController\DoctorController::class,'show']);
Route::get('GetTypes',[App\Http\Controllers\TypeController\TypeController::class,'index']);
Route::get('GetTypeId/{id}',[App\Http\Controllers\TypeController\TypeController::class,'show']);
Route::post('Login',[App\Http\Controllers\Auth\LoginController::class, 'login']);

//***************************************User Management******************************************** */
Route::post('StoreAgentUser',[App\Http\Controllers\User\UserController::class,'store']);
Route::get('GetAgentUsers',[App\Http\Controllers\User\UserController::class,'index']);
Route::get('GetRoles',[App\Http\Controllers\User\RoleController::class,'index']);
Route::get('GetPermissions',[App\Http\Controllers\User\PermossionController::class,'index']);
