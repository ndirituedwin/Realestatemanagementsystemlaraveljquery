<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\VacantunitController;
use App\Http\Controllers\TenantbalanceController;

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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/signin',[AuthController::class,'getlogin'])->name('login');
     Route::post('/signin',[AuthController::class,'postlogin']);
     Route::post('/verifyusername',[AuthController::class,'verifyusername']);
     Route::post('/verifypassword',[AuthController::class,'verifypassword']);
});
Route::group(['middleware'=>['auth']],function(){
Route::get('/homepage',[AuthController::class,'getwelcomepage'])->name('home.beforerecords');
Route::get('/vacantunits',[AuthController::class,'homepage'])->name('homepage');
Route::get('/singletenantbalance/{name}',[TenantbalanceController::class,'getsingletenantbalance'])->name('tenant.single');
Route::post('/get/properties',[VacantunitController::class,'getvacantunits']);
Route::get('/get/siglevacantunit/{id}',[VacantunitController::class,'singlevacantunit'])->name('single.vacantunit');
Route::get('/tenantbalances',[TenantbalanceController::class,'tenantbalances'])->name('tenant.balances');

Route::post('/get/tenantbalances',[TenantbalanceController::class,'gettenantbalances']);
Route::post('/get/categories',[categorycontroller::class,'getvacantunitsbycategor']);
Route::post('/get/statuss',[categorycontroller::class,'statusselect']);

Route::post('/get/fieldofficer',[TenantbalanceController::class,'gettenatbalancesbyfieldofficer']);
Route::post('/get/payableselect',[TenantbalanceController::class,'gettenatbalancesbypayables']);
Route::post('/get/yearselect',[TenantbalanceController::class,'gettenatbalancesbyyear']);
Route::post('/get/monthselect',[TenantbalanceController::class,'gettenatbalancesbymonth']);

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

  