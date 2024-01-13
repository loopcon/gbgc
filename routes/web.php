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
Route::post('customer-checklogin',[FrontedController::class,'checklogin'])->name('customer-checklogin');
Route::get('How_its_Work',[FrontedController::class,'howitswork'])->name('howitswork');

Route::group(['middleware' => ['auth']], function () { 

    Route::get('/backend', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('adminindex');

//membershipplan
Route::get('admin/membership',[App\Http\Controllers\Admin\MembersipplanController::class, 'index'])->name('adminmembership');
Route::get('admin/add-membership-plan',[App\Http\Controllers\Admin\MembersipplanController::class, 'add'])->name('addmembershipplan');
Route::post('admin/store-membership-plan',[App\Http\Controllers\Admin\MembersipplanController::class, 'store'])->name('storemembershipplan');
Route::get('admin/edit-membership-plan/{id}',[App\Http\Controllers\Admin\MembersipplanController::class, 'edit'])->name('membershipplanedit');
Route::post('admin/update-membership-plan',[App\Http\Controllers\Admin\MembersipplanController::class, 'update'])->name('membershipplanupdate');
Route::get('admin/delete-membership-plan/{id}',[App\Http\Controllers\Admin\MembersipplanController::class, 'delete'])->name('membershipplandelete');
//endmembershipplan


//settings
Route::get('admin/websitelogo',[App\Http\Controllers\Admin\SettingController::class, 'websitelogo'])->name('websitelogo');
Route::post('admin/websitelogoupdate',[App\Http\Controllers\Admin\SettingController::class, 'websitelogoupdate'])->name('websitelogoupdate');
//endsettings

//adminprofile
Route::get('/adminprofile', [App\Http\Controllers\Admin\AdminprofileController::class, 'profile'])->name('adminprofile');
Route::post('/updateprofile', [App\Http\Controllers\Admin\AdminprofileController::class, 'updateprofile'])->name('updateprofile');
//endadminprofile

//aboutus
Route::get('/aboutus', [App\Http\Controllers\Admin\AboutUsController::class,'index'])->name('aboutus');
Route::post('aboutus-update',[App\Http\Controllers\Admin\AboutUsController::class, 'update'])->name('aboutus-update');
//endaboutus

//faq
Route::get('/faq', [App\Http\Controllers\Admin\FaqController::class,'index'])->name('faq');
Route::get('faq-create',[App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq-create');
Route::post('faq-store',[App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq-store');
Route::get('faq-edit/{id}',[App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq-edit');
Route::post('faq-update/{id}',[App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq-update');
Route::get('faq-delete/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq-delete');
Route::post('faq-datatable', [App\Http\Controllers\Admin\FaqController::class, 'listDatatable'])->name('faq-datatable');
//endfaq

//customer
Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class,'index'])->name('customer');
Route::get('customer-create',[App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customer-create');
Route::post('customer-store',[App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer-store');
Route::get('customer-delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer-delete');
});
//endcustomer

Auth::routes();

Route::get('/home',[App\Http\Controllers\Admin\IndexController::class, 'index'])->name('adminindex');
