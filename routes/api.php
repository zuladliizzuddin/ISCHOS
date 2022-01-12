<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeScanController;
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

// Route::middleware('auth:api')->get('qrcodescan', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['auth','api']], function(){
//     Route::get('qrcodescanss', [QrCodeScanController::class, 'index']);
// });

//Insert new data qrcode
Route::post('qrcodescan', [QrCodeScanController::class, 'store']);
Route::get('qrcodescan', [QrCodeScanController::class, 'index']);
Route::get('testing/qrcodescan', [QrCodeScanController::class, 'testing']);
