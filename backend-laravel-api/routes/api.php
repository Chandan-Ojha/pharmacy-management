<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\DrugController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 *  User Credentials
 */
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    //Route::post('create-vendor',[VendorController::class,'create_vendor']);
});

/**
 * Vendor Api Route List
 */
Route::get('get-vendor-list',[VendorController::class,'get_vendor_list']);
Route::post('create-vendor',[VendorController::class,'create_vendor']);
Route::put('update-vendor/{vendor_id}',[VendorController::class,'update_vendor']);
Route::delete('delete-vendor/{vendor_id}',[VendorController::class,'delete_vendor']);

/**
 * Drug Api Route List
 */
Route::get('get-drug-list',[DrugController::class,'get_drug_list']);
Route::post('create-drug',[DrugController::class,'create_drug']);
Route::put('update-drug/{drug_id}',[DrugController::class,'update_drug']);
Route::delete('delete-drug/{drug_id}',[DrugController::class,'delete_drug']);

