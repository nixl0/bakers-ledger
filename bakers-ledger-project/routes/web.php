<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\UserController;

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


Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


Route::get('/queries', function () {
    return view('queries');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/settlements/create', [SettlementController::class, 'create'])->middleware('auth');
Route::post('/settlements', [SettlementController::class, 'store'])->middleware('auth');
Route::get('/settlements', [SettlementController::class, 'index']);
Route::get('/settlements/{settlement}/edit', [SettlementController::class, 'edit'])->middleware('auth');
Route::put('/settlements/{settlement}', [SettlementController::class, 'update'])->middleware('auth');
Route::delete('/settlements/{settlement}', [SettlementController::class, 'destroy'])->middleware('auth');
Route::get('/settlements/{settlement}', [SettlementController::class, 'show']);

Route::get('/legals/create', [LegalController::class, 'create'])->middleware('auth');
Route::post('/legals', [LegalController::class, 'store'])->middleware('auth');
Route::get('/legals', [LegalController::class, 'index']);
Route::get('/legals/{legal}/edit', [LegalController::class, 'edit'])->middleware('auth');
Route::put('/legals/{legal}', [LegalController::class, 'update'])->middleware('auth');
Route::delete('/legals/{legal}', [LegalController::class, 'destroy'])->middleware('auth');
Route::get('/legals/{legal}', [LegalController::class, 'show']);

Route::get('/grades/create', [GradeController::class, 'create'])->middleware('auth');
Route::post('/grades', [GradeController::class, 'store'])->middleware('auth');
Route::get('/grades', [GradeController::class, 'index']);
Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->middleware('auth');
Route::put('/grades/{grade}', [GradeController::class, 'update'])->middleware('auth');
Route::delete('/grades/{grade}', [GradeController::class, 'destroy'])->middleware('auth');
Route::get('/grades/{grade}', [GradeController::class, 'show']);

Route::get('/districts/create', [DistrictController::class, 'create'])->middleware('auth');
Route::post('/districts', [DistrictController::class, 'store'])->middleware('auth');
Route::get('/districts', [DistrictController::class, 'index']);
Route::get('/districts/{district}/edit', [DistrictController::class, 'edit'])->middleware('auth');
Route::put('/districts/{district}', [DistrictController::class, 'update'])->middleware('auth');
Route::delete('/districts/{district}', [DistrictController::class, 'destroy'])->middleware('auth');
Route::get('/districts/{district}', [DistrictController::class, 'show']);

Route::get('/companies/create', [CompanyController::class, 'create'])->middleware('auth');
Route::post('/companies', [CompanyController::class, 'store'])->middleware('auth');
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware('auth');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->middleware('auth');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth');
Route::get('/companies/{company}', [CompanyController::class, 'show']);

Route::get('/owners/create', [OwnerController::class, 'create'])->middleware('auth');
Route::post('/owners', [OwnerController::class, 'store'])->middleware('auth');
Route::get('/owners', [OwnerController::class, 'index']);
Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->middleware('auth');
Route::put('/owners/{owner}', [OwnerController::class, 'update'])->middleware('auth');
Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->middleware('auth');
Route::get('/owners/{owner}', [OwnerController::class, 'show']);

Route::get('/shops/create', [ShopController::class, 'create'])->middleware('auth');
Route::post('/shops', [ShopController::class, 'store'])->middleware('auth');
Route::get('/shops', [ShopController::class, 'index']);
Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->middleware('auth');
Route::put('/shops/{shop}', [ShopController::class, 'update'])->middleware('auth');
Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->middleware('auth');
Route::get('/shops/{shop}', [ShopController::class, 'show']);

Route::get('/deliveries/create', [DeliveryController::class, 'create'])->middleware('auth');
Route::post('/deliveries', [DeliveryController::class, 'store'])->middleware('auth');
Route::get('/deliveries', [DeliveryController::class, 'index']);
Route::get('/deliveries/{delivery}/edit', [DeliveryController::class, 'edit'])->middleware('auth');
Route::put('/deliveries/{delivery}', [DeliveryController::class, 'update'])->middleware('auth');
Route::delete('/deliveries/{delivery}', [DeliveryController::class, 'destroy'])->middleware('auth');
Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show']);

Route::get('/trademarks/create', [TrademarkController::class, 'create'])->middleware('auth');
Route::post('/trademarks', [TrademarkController::class, 'store'])->middleware('auth');
Route::get('/trademarks', [TrademarkController::class, 'index']);
Route::get('/trademarks/{trademark}/edit', [TrademarkController::class, 'edit'])->middleware('auth');
Route::put('/trademarks/{trademark}', [TrademarkController::class, 'update'])->middleware('auth');
Route::delete('/trademarks/{trademark}', [TrademarkController::class, 'destroy'])->middleware('auth');
Route::get('/trademarks/{trademark}', [TrademarkController::class, 'show']);
