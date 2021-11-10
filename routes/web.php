<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\VacantunitController;
use App\Http\Controllers\TenantbalanceController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Tenantstatementcontroller;
use App\Http\Controllers\AjaxLoginController;
use App\Http\Controllers\PaginationController;
use App\Models\Tenantbalance;
use App\Http\Controllers\LandlordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/read{}',function(){

});*/



Route::get('/',[WelcomeController::class,'getlogin'])->name('welcome');
//Route::get('/signin',[AuthController::class,'getlogin'])->name('login');
Route::get('/signin',[AuthController::class,'getlogin'])->name('login');

Route::group(['middleware'=>['Guest']],function(){
    Route::post('/signin',[AuthController::class,'postlogin'])->name("staff");
    Route::post('/landlord/signin',[AuthController::class,'postloginlandlord'])->name('landlord.login');
    Route::post('/tenant/signin',[AuthController::class,'postlogintenant'])->name('tenant.login');
    Route::post('/verifyusername',[AuthController::class,'verifyusername']);
     Route::post('/verifypassword',[AuthController::class,'verifypassword']);

     //ajaxlogin
     Route::post('/signinstaff',[AjaxLoginController::class,'loginstafff'])->name("stafflogin");
     Route::post('/signinlandlord',[AjaxLoginController::class,'loginlandlord'])->name("landordlogin");
     Route::post('/signintenant',[AjaxLoginController::class,'logintenant'])->name("tenantloginnnn");


});
//Route::group(['middleware'=>['auth']],function(){
Route::group(['middleware'=>['Checkuser']],function(){
    /**staff */
    Route::get('/homepage',[AuthController::class,'getwelcomepage'])->name('home.beforerecords');
   //homesection
   Route::get('/propwigs_pause',[AuthController::class,'home'])->name('homepage');
   Route::get('/vacantunittss',[AuthController::class,'homepage'])->name('vacantunits');
   Route::post('/get/properties',[VacantunitController::class,'getvacantunits']);
    Route::post('/get/categories',[categorycontroller::class,'getvacantunitsbycategor']);
    Route::post('/get/statuss',[categorycontroller::class,'statusselect']);
   //tenantssection
    Route::get('/tenantbalances',[TenantbalanceController::class,'tenantbalances'])->name('tenant.balances');
    Route::post('/get/tenantbalances',[TenantbalanceController::class,'gettenantbalances']);
    Route::post('/get/fieldofficer',[TenantbalanceController::class,'gettenatbalancesbyfieldofficer']);
    Route::post('/get/payableselect',[TenantbalanceController::class,'gettenatbalancesbypayables']);
    Route::post('/get/monthselect',[TenantbalanceController::class,'gettenatbalancesbymonth']);
    Route::post('/get/yearselect',[TenantbalanceController::class,'gettenatbalancesbyyear']);
    Route::get('/singletenantbalance/{name}',[TenantbalanceController::class,'getsingletenantbalance'])->name('tenant.single');
    //tenant statement section
    Route::get('/tenantstatement',[Tenantstatementcontroller::class,'viewtenantstatement'])->name('tenant.viewstatement');
    Route::post('/get/tenantstatement',[Tenantstatementcontroller::class,'onpropertychanged']);
    Route::post('/tenant/generatestatement',[Tenantstatementcontroller::class,'generatetenantstatement'])->name('tenant.generatestatement');
    Route::get('/tenant/viewmakestatement',[Tenantstatementcontroller::class,'makepdfforenant'])->name('tenant.makestatement');
/**end of staff */
/** LOGGED IN TENANT SECTION*/
Route::get('/loggedtenant/statement',[AuthController::class,'loggedtenantstatement'])->name('loggedtenantstatement');
Route::post('/loggedtenant/previewstatement',[AuthController::class,'loggedtenantpreviewstatement']);
Route::get('/loggedtenant/generatepdf',[AuthController::class,'loggedtenantgeneratepdf'])->name('loggedtenant.generatepdf');

/**END OF LOGGED IN SECTION */
/**LOGGED IN LANDLORD SECTION */
Route::get('/landlordhomepage',[AuthController::class,'landlordhomeage'])->name("monthly.transactions");
Route::post('/loggedlandlord/fetchpayablesonpropertychange',[AuthController::class,'loadpayableonpropertychange']);
Route::post('/loggedlandlord/fetchrecordsonpropertyselect',[AuthController::class,'loggedlandlordrecords']);
Route::post('/fetch/statement/onmonthselect',[AuthController::class,'fetchstatementonmonthselect']);
Route::post('/fetch/statement/onyearselect',[AuthController::class,'fetchstatementonyearselect']);
Route::post('/fetch/statement/onpayableselect',[AuthController::class,'fetchstatementonpayableselect']);
Route::get('/generate/pdf/bylandlord',[AuthController::class,'generatelandlordpdf'])->name('landlord.statementgenerate');

//landlord statementsection
Route::get('/landlord/statement/get',[LandlordController::class,'getlandlordstatement'])->name('landlordstatement');
Route::post('/landlord_stmt_preview/get',[LandlordController::class,'previewstmt']);
Route::get('/landlord_transactions/pdf_generate',[LandlordController::class,'lltransactions'])->name('landlord.lltransactions');

/** END OF LOGGED IN LANDLORD SECTION */
Route::get('/get/siglevacantunit/{id}',[VacantunitController::class,'singlevacantunit'])->name('single.vacantunit');

//pagination
Route::get('/pagination', [PaginationController::class,'index']);
Route::get('pagination/fetch_data', [PaginationController::class,'fetch_data']);

// Route::post('/logged/tenant/generatestatement',[AuthController::class,'maketenantstatement'])->name('loggedtenant.makestatement');
// Route::post('/loggedtenant/generatestatement',[AuthController::class,'loggedtenantstatement']);
// Route::get('/tenant/generate_pdf',[Tenantstatementcontroller::class,'generate_pdf'])->name('tenant.generate_pdf');


//landlord
});
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

/*
Route::get('/homebforerecords',[AuthController::class,'getwelcomepage'])->name('home.beforerecords');
Route::get('/homepage',[AuthController::class,'homepage'])->name('homepage');
Route::get('/singletenantbalance/{name}',[TenantbalanceController::class,'getsingletenantbalance'])->name('tenant.single');
Route::post('/get/properties',[VacantunitController::class,'getvacantunits']);
Route::get('/get/siglevacantunit/{id}',[VacantunitController::class,'singlevacantunit'])->name('single.vacantunit');
Route::get('/tenantbalances',[TenantbalanceController::class,'tenantbalances'])->name('tenant.balances');
Route::post('/get/tenantbalances',[TenantbalanceController::class,'gettenantbalances']);
Route::post('/get/fieldofficer',[TenantbalanceController::class,'gettenatbalancesbyfieldofficer']);
Route::post('/get/fieldofficer',[TenantbalanceController::class,'gettenatbalancesbyfieldofficer']);
Route::post('/get/payableselect',[TenantbalanceController::class,'gettenatbalancesbypayables']);
Route::post('/get/yearselect',[TenantbalanceController::class,'gettenatbalancesbyyear']);
Route::post('/get/categories',[categorycontroller::class,'getvacantunitsbycategor']);
*/
//Route::get('/vac',[VacantunitController::class,'vacant']);
