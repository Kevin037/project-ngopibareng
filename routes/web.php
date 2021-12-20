<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index']);
Route::get('/data-user',[UserController::class,'index']);
Route::get('/data-role',[RoleController::class,'index']);
Route::get('/edit-profil{id}',[UserController::class,'edit_profil']);
Route::post('/update-profil{id}',[UserController::class,'update_profil']);

Route::group(['middleware' => 'admin' ],function(){
Route::post('/tambah-user',[UserController::class,'tambah']);
Route::get('/edit-user{id}',[UserController::class,'edit_user']);
Route::post('/update-user{id}',[UserController::class,'update_user']);
Route::get('/hapus-user{id}',[UserController::class,'hapus']);
Route::post('/tambah-role',[RoleController::class,'tambah']);
Route::get('/edit-role{id}',[RoleController::class,'edit_role']);
Route::post('/update-role{id}',[RoleController::class,'update_role']);
Route::get('/hapus-role{id}',[RoleController::class,'hapus']);
Route::get('/excel-user',[UserController::class,'excel_user']);
});

Auth::routes();