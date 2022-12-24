<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TrademarkController;
use App\Models\Trademark;

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



Route::get('/', function () {
    return view('home');
});

Route::get('/queries', function () {
    return view('queries');
});

Route::get('/settlements/create', [SettlementController::class, 'create']);
Route::post('/settlements', [SettlementController::class, 'store']);
Route::get('/settlements', [SettlementController::class, 'index']);
Route::get('/settlements/{settlement}/edit', [SettlementController::class, 'edit']);
Route::put('/settlements/{settlement}', [SettlementController::class, 'update']);
Route::delete('/settlements/{settlement}', [SettlementController::class, 'destroy']);
Route::get('/settlements/{settlement}', [SettlementController::class, 'show']);

Route::get('/legals/create', [LegalController::class, 'create']);
Route::post('/legals', [LegalController::class, 'store']);
Route::get('/legals', [LegalController::class, 'index']);
Route::get('/legals/{legal}/edit', [LegalController::class, 'edit']);
Route::put('/legals/{legal}', [LegalController::class, 'update']);
Route::delete('/legals/{legal}', [LegalController::class, 'destroy']);
Route::get('/legals/{legal}', [LegalController::class, 'show']);

Route::get('/grades/create', [GradeController::class, 'create']);
Route::post('/grades', [GradeController::class, 'store']);
Route::get('/grades', [GradeController::class, 'index']);
Route::get('/grades/{grade}/edit', [GradeController::class, 'edit']);
Route::put('/grades/{grade}', [GradeController::class, 'update']);
Route::delete('/grades/{grade}', [GradeController::class, 'destroy']);
Route::get('/grades/{grade}', [GradeController::class, 'show']);

Route::get('/districts/create', [DistrictController::class, 'create']);
Route::post('/districts', [DistrictController::class, 'store']);
Route::get('/districts', [DistrictController::class, 'index']);
Route::get('/districts/{district}/edit', [DistrictController::class, 'edit']);
Route::put('/districts/{district}', [DistrictController::class, 'update']);
Route::delete('/districts/{district}', [DistrictController::class, 'destroy']);
Route::get('/districts/{district}', [DistrictController::class, 'show']);

Route::get('/companies/create', [CompanyController::class, 'create']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
Route::get('/companies/{company}', [CompanyController::class, 'show']);

Route::get('/owners/create', [OwnerController::class, 'create']);
Route::post('/owners', [OwnerController::class, 'store']);
Route::get('/owners', [OwnerController::class, 'index']);
Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit']);
Route::put('/owners/{owner}', [OwnerController::class, 'update']);
Route::delete('/owners/{owner}', [OwnerController::class, 'destroy']);
Route::get('/owners/{owner}', [OwnerController::class, 'show']);

Route::get('/shops/create', [ShopController::class, 'create']);
Route::post('/shops', [ShopController::class, 'store']);
Route::get('/shops', [ShopController::class, 'index']);
Route::get('/shops/{shop}/edit', [ShopController::class, 'edit']);
Route::put('/shops/{shop}', [ShopController::class, 'update']);
Route::delete('/shops/{shop}', [ShopController::class, 'destroy']);
Route::get('/shops/{shop}', [ShopController::class, 'show']);

Route::get('/deliveries/create', [DeliveryController::class, 'create']);
Route::post('/deliveries', [DeliveryController::class, 'store']);
Route::get('/deliveries', [DeliveryController::class, 'index']);
Route::get('/deliveries/{delivery}/edit', [DeliveryController::class, 'edit']);
Route::put('/deliveries/{delivery}', [DeliveryController::class, 'update']);
Route::delete('/deliveries/{delivery}', [DeliveryController::class, 'destroy']);
Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show']);

Route::get('/trademarks/create', [TrademarkController::class, 'create']);
Route::post('/trademarks', [TrademarkController::class, 'store']);
Route::get('/trademarks', [TrademarkController::class, 'index']);
Route::get('/trademarks/{trademark}/edit', [TrademarkController::class, 'edit']);
Route::put('/trademarks/{trademark}', [TrademarkController::class, 'update']);
Route::delete('/trademarks/{trademark}', [TrademarkController::class, 'destroy']);
Route::get('/trademarks/{trademark}', [TrademarkController::class, 'show']);
