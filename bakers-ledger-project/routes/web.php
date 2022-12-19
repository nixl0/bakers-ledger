<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LegalController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\UserController;
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

Route::get('/settlements/{settlement}', [SettlementController::class, 'show']);
Route::get('/settlements', [SettlementController::class, 'index']);

Route::get('/legals/{legal}', [LegalController::class, 'show']);
Route::get('/legals', [LegalController::class, 'index']);

Route::get('/grades/{grade}', [GradeController::class, 'show']);
Route::get('/grades', [GradeController::class, 'index']);

Route::get('/districts/{district}', [DistrictController::class, 'show']);
Route::get('/districts', [DistrictController::class, 'index']);

Route::get('/companies/{company}', [CompanyController::class, 'show']);
Route::get('/companies', [CompanyController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/shops/{shop}', [ShopController::class, 'show']);
Route::get('/shops', [ShopController::class, 'index']);

Route::get('/deliveries/{delivery}', [DeliveryController::class, 'show']);
Route::get('/deliveries', [DeliveryController::class, 'index']);

Route::get('/trademarks/{trademark}', [TrademarkController::class, 'show']);
Route::get('/trademarks', [TrademarkController::class, 'index']);
