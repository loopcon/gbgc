<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fornted\FrontedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontedController::class,'index'])->name('index');
Route::get('Faq',[FrontedController::class,'faq'])->name('faq');
Route::get('How_its_Work',[FrontedController::class,'howitswork'])->name('howitswork');

Route::group(['middleware' => ['auth']], function () { 

Route::get('/backend', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('adminindex');

//settings
Route::get('admin/websitelogo',[App\Http\Controllers\Admin\SettingController::class, 'websitelogo'])->name('websitelogo');
Route::post('admin/websitelogoupdate',[App\Http\Controllers\Admin\SettingController::class, 'websitelogoupdate'])->name('websitelogoupdate');
//endsettings

//adminprofile
Route::get('/adminprofile', [App\Http\Controllers\Admin\AdminprofileController::class, 'profile'])->name('adminprofile');
Route::post('/updateprofile', [App\Http\Controllers\Admin\AdminprofileController::class, 'updateprofile'])->name('updateprofile');
//endadminprofile
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
