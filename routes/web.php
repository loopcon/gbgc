<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontLoginController;
use App\Http\Controllers\Frontend\ReportController;

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

//Fronted Route

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::post('/store-newsletter',[FrontendController::class, 'storeNewsletter'])->name('store-newsletter');
Route::get('faq',[FrontendController::class,'faq'])->name('faq');
Route::get('how-it-works',[FrontendController::class,'howitswork'])->name('howitswork');
Route::get('membership',[FrontendController::class,'membership'])->name('membership');
Route::get('thank-you',[FrontendController::class,'thankyou'])->name('thankyou');
Route::get('lost-password',[FrontendController::class,'lostpassword'])->name('lostpassword');
Route::get('check-out',[FrontendController::class,'checkout'])->name('checkout');
Route::get('additional-check-out',[FrontendController::class,'additionalcheckout'])->name('additionalcheckout');

Route::post('placeorder',[FrontendController::class,'placeorder'])->name('placeorder');

Route::get('/contactus',[FrontendController::class, 'contactus'])->name('frontcontactus');
Route::post('/store-contactus',[FrontendController::class, 'storeContactus'])->name('store-contactus');

Route::post('registration',[FrontLoginController::class, 'registration'])->name('registration');
Route::post('registration-update',[FrontLoginController::class, 'registrationUpdate'])->name('registration-update');

Route::post('proregistration',[FrontLoginController::class, 'proregistration'])->name('proregistration');

Route::post('storeadditionaluser',[FrontLoginController::class, 'storeadditionaluser'])->name('storeadditionaluser');

Route::post('customer-checklogin',[FrontLoginController::class,'checklogin'])->name('customer-checklogin');
Route::get('customer-logout', [FrontLoginController::class, 'logout'])->name('customer-logout');
Route::get('myaccount',[FrontLoginController::class, 'myAccount'])->name('myaccount');
Route::post('/updatemyaccount', [FrontLoginController::class, 'updateMyAccount'])->name('updatemyaccount');
Route::get('dashboard',[FrontLoginController::class, 'dashboard'])->name('frontdashboard');
Route::get('report',[ReportController::class, 'index'])->name('frontreport');
Route::get('export-report',[ReportController::class,'exportReport'])->name('export-report');
Route::post('report_list/{page}', [ReportController::class, 'reportList'])->name('frontreportlist');

Route::post('scoreview', [ReportController::class, 'scoreview'])->name('scoreview');


Route::post('verifytotp',[FrontLoginController::class,'verifytotp'])->name('verifytotp');
//fronted Route End


//backend Route
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
    Route::get('admin/faq', [App\Http\Controllers\Admin\FaqController::class,'index'])->name('adminfaq');
    Route::get('admin/faq-create',[App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq-create');
    Route::post('admin/faq-store',[App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq-store');
    Route::get('admin/faq-edit/{id}',[App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq-edit');
    Route::post('admin/faq-update/{id}',[App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq-update');
    Route::get('admin/faq-delete/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq-delete');
    //endfaq

    //customer
    Route::get('admin/user', [App\Http\Controllers\Admin\CustomerController::class,'index'])->name('user');
    Route::get('admin/user-change-status/{id}/{status}',[App\Http\Controllers\Admin\CustomerController::class,'changeStatus'])->name('user-change-status');
    Route::get('admin/user-password-create/{id}',[App\Http\Controllers\Admin\CustomerController::class, 'createIdPassword'])->name('user-password-create');
    Route::post('admin/password-update/{id}',[App\Http\Controllers\Admin\CustomerController::class, 'updatePassword'])->name('password-update');
     Route::get('admin/user-cancel/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'cancelRequest'])->name('user-cancel');
    Route::get('admin/user-delete/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('user-delete');
    //endcustomer


    //additional user
    Route::get('admin/additional-user', [App\Http\Controllers\Admin\AdditionalUserController::class,'index'])->name('additional-user');
    Route::get('admin/additional-user-create/{id}',[App\Http\Controllers\Admin\AdditionalUserController::class, 'additionalUserCreate'])->name('additional-user-create');
    Route::post('admin/additional-user-store/{id}',[App\Http\Controllers\Admin\AdditionalUserController::class, 'additionalUserStore'])->name('additional-user-store');
    Route::get('admin/additional-user-delete/{id}', [App\Http\Controllers\Admin\AdditionalUserController::class, 'destroy'])->name('additional-user-delete');
    Route::get('admin/additionaluser-password-create/{id}',[App\Http\Controllers\Admin\AdditionalUserController::class, 'createIdPassword'])->name('additionaluser-password-create');
    Route::post('admin/additionaluser-password-update/{id}',[App\Http\Controllers\Admin\AdditionalUserController::class, 'updatePassword'])->name('additionaluser-password-update');
    //end additional user



    //general-setting
    Route::get('admin/generalsetting', [App\Http\Controllers\Admin\SettingController::class,'generalSetting'])->name('generalsetting');
    Route::post('admin/generalsetting-update',[App\Http\Controllers\Admin\SettingController::class, 'generalSettingUpdate'])->name('generalsetting-update');
    //end general-setting

    //static page
    Route::get('admin/staticpage', [App\Http\Controllers\Admin\StaticPageController::class,'index'])->name('staticpage');
    Route::get('admin/staticpage-create',[App\Http\Controllers\Admin\StaticPageController::class, 'create'])->name('staticpage-create');
    Route::post('admin/staticpage-store',[App\Http\Controllers\Admin\StaticPageController::class, 'store'])->name('staticpage-store');
    Route::get('admin/staticpage-edit/{id}',[App\Http\Controllers\Admin\StaticPageController::class, 'edit'])->name('staticpage-edit');
    Route::post('admin/staticpage-update/{id}',[App\Http\Controllers\Admin\StaticPageController::class, 'update'])->name('staticpage-update');
    Route::get('admin/staticpage-delete/{id}', [App\Http\Controllers\Admin\StaticPageController::class, 'destroy'])->name('staticpage-delete');
    //end static page

    //newsletter
    Route::get('admin/newsletter', [App\Http\Controllers\Admin\NewsletterController::class,'index'])->name('newsletter');
    Route::get('admin/newsletter-delete/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'destroy'])->name('newsletter-delete');
    //endnewsletter

    //region
    Route::get('admin/region', [App\Http\Controllers\Admin\RegionController::class,'index'])->name('region');
    Route::get('admin/region-create',[App\Http\Controllers\Admin\RegionController::class, 'create'])->name('region-create');
    Route::post('admin/region-store',[App\Http\Controllers\Admin\RegionController::class, 'store'])->name('region-store');
    Route::get('admin/region-edit/{id}',[App\Http\Controllers\Admin\RegionController::class, 'edit'])->name('region-edit');
    Route::post('admin/region-update/{id}',[App\Http\Controllers\Admin\RegionController::class, 'update'])->name('region-update');
    Route::get('admin/region-delete/{id}', [App\Http\Controllers\Admin\RegionController::class, 'destroy'])->name('region-delete');
    //endregion

    //conatcus
    Route::get('admin/contactus', [App\Http\Controllers\Admin\ContactusController::class,'index'])->name('contactus');
    Route::get('admin/contactus-delete/{id}', [App\Http\Controllers\Admin\ContactusController::class, 'destroy'])->name('contactus-delete');
    //endconatctus

    //homepage banner
    Route::get('admin/homepagebanner', [App\Http\Controllers\Admin\HomepageBannerController::class,'index'])->name('homepagebanner');
    Route::post('admin/homepagebanner-update',[App\Http\Controllers\Admin\HomepageBannerController::class, 'update'])->name('homepagebanner-update');
    //end homepage banner

    //homepage reports
    Route::get('admin/homepagereport', [App\Http\Controllers\Admin\HomepageReportController::class,'index'])->name('homepagereport');
    Route::get('admin/homepagereport-create',[App\Http\Controllers\Admin\HomepageReportController::class, 'create'])->name('homepagereport-create');
    Route::post('admin/homepagereport-store',[App\Http\Controllers\Admin\HomepageReportController::class, 'store'])->name('homepagereport-store');
    Route::get('admin/homepagereport-edit/{id}',[App\Http\Controllers\Admin\HomepageReportController::class, 'edit'])->name('homepagereport-edit');
    Route::post('admin/homepagereport-update/{id}',[App\Http\Controllers\Admin\HomepageReportController::class, 'update'])->name('homepagereport-update');
    Route::get('admin/homepagereport-delete/{id}', [App\Http\Controllers\Admin\HomepageReportController::class, 'destroy'])->name('homepagereport-delete');
    //end homepage reports

    //reports
    Route::get('admin/report', [App\Http\Controllers\Admin\ReportController::class,'index'])->name('adminreport');
    Route::get('admin/export-score',[App\Http\Controllers\Admin\ReportController::class,'exportScore'])->name('export-scores');
    Route::post('admin/import-score',[App\Http\Controllers\Admin\ReportController::class,'importScore'])->name('import-scores');
    Route::post('admin/report_list/{page}', [App\Http\Controllers\Admin\ReportController::class, 'reportList'])->name('adminreportlist');
    //end reports

     //reports
    Route::get('admin/glossary', [App\Http\Controllers\Admin\GlossaryController::class,'index'])->name('adminglossary');
    //end reports

    //datatext
    Route::get('admin/datatext', [App\Http\Controllers\Admin\DatatextController::class,'index'])->name('admindatatext');
    Route::get('admin/datatext-create',[App\Http\Controllers\Admin\DatatextController::class, 'create'])->name('datatext-create');
    Route::post('admin/datatext-store',[App\Http\Controllers\Admin\DatatextController::class, 'store'])->name('datatext-store');
    Route::get('admin/datatext-edit/{id}',[App\Http\Controllers\Admin\DatatextController::class, 'edit'])->name('datatext-edit');
    Route::post('admin/datatext-update/{id}',[App\Http\Controllers\Admin\DatatextController::class, 'update'])->name('datatext-update');
    Route::get('admin/datatext-delete/{id}', [App\Http\Controllers\Admin\DatatextController::class, 'destroy'])->name('datatext-delete');
    Route::post('admin/sub_category_1', [App\Http\Controllers\Admin\DatatextController::class, 'fetchsub_category_1']);
    Route::post('admin/sub_category_2', [App\Http\Controllers\Admin\DatatextController::class, 'fetchsub_category_2']);
    Route::post('admin/level_4', [App\Http\Controllers\Admin\DatatextController::class, 'fetchlevel_4']);
    //end datatext

    //levelmaster
    Route::get('admin/level', [App\Http\Controllers\Admin\LevelMasterController::class,'index'])->name('adminlevel');
    Route::get('admin/level-create',[App\Http\Controllers\Admin\LevelMasterController::class, 'create'])->name('level-create');
    Route::post('admin/level-store',[App\Http\Controllers\Admin\LevelMasterController::class, 'store'])->name('level-store');
    Route::get('admin/level-edit/{id}',[App\Http\Controllers\Admin\LevelMasterController::class, 'edit'])->name('level-edit');
    Route::post('admin/level-update/{id}',[App\Http\Controllers\Admin\LevelMasterController::class, 'update'])->name('level-update');
    Route::get('admin/level-delete/{id}', [App\Http\Controllers\Admin\LevelMasterController::class, 'destroy'])->name('level-delete');
    Route::post('admin/parent_level', [App\Http\Controllers\Admin\LevelMasterController::class, 'fetchParentLevel']);
    //end levelmaster

    //score
    Route::get('admin/score', [App\Http\Controllers\Admin\ScoreController::class,'index'])->name('adminscore');
    Route::get('admin/export-score',[App\Http\Controllers\Admin\ScoreController::class,'exportScore'])->name('export-scores');
    Route::post('admin/import-score',[App\Http\Controllers\Admin\ScoreController::class,'importScore'])->name('import-scores');
    //end score

    //emailtemplates
    Route::get('admin/emailtemplates', [App\Http\Controllers\Admin\EmailTemplateController::class,'index'])->name('admin-emailtemplates');
    Route::post('admin/emailtemplate-update',[App\Http\Controllers\Admin\EmailTemplateController::class, 'update'])->name('admin-emailtemplate-update');
    //end email-template

    //currency
    Route::get('admin/currency',[App\Http\Controllers\Admin\CurrencyController::class,'index'])->name('admincurrency');
    Route::get('admin/currency-create',[App\Http\Controllers\Admin\CurrencyController::class,'create'])->name('currency-create');
    Route::post('admin/currency-store',[App\Http\Controllers\Admin\CurrencyController::class,'store'])->name("currency-store");
    Route::get('admin/currency-edit/{id}',[App\Http\Controllers\Admin\CurrencyController::class, 'edit'])->name('currency-edit');
    Route::post('admin/currency-update/{id}',[App\Http\Controllers\Admin\CurrencyController::class, 'update'])->name('currency-update');
    Route::get('admin/currency-delete/{id}', [App\Http\Controllers\Admin\CurrencyController::class, 'destroy'])->name('currency-delete');
    //end currency
});

 $static = Cache::remember('static_pages', 10, function() { 
                    return DB::table('static_pages')
                    ->get();
                });
        if(!empty($static)) {
            foreach ($static as $value) {
               Route::get($value->slug,[FrontendController::class, 'staticpage'])->name($value->slug);
            }
        }
Auth::routes();


