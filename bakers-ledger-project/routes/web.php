<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\QueryController;
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

Route::get('/', function () {
    return view('home');
});


Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::controller(QueryController::class)->group(function () {
    Route::get('/queries', 'index');
    Route::get('/queries/inner_join_1', 'inner_join_1');
    Route::get('/queries/inner_join_2', 'inner_join_2');
    Route::get('/queries/inner_join_3', 'inner_join_3');
    Route::get('/queries/inner_join_4', 'inner_join_4');
    Route::get('/queries/inner_join_5', 'inner_join_5');
    Route::get('/queries/inner_join_6', 'inner_join_6');
    Route::get('/queries/inner_join_7', 'inner_join_7');
    Route::get('/queries/left_join', 'left_join');
    Route::get('/queries/right_join', 'right_join');
    Route::get('/queries/select_in_select', 'select_in_select');
});

Route::controller(SettlementController::class)->group(function () {
    Route::get('/settlements/create', 'create')->middleware('auth');
    Route::post('/settlements', 'store')->middleware('auth');
    Route::get('/settlements', 'index');
    Route::get('/settlements/{settlement}/edit', 'edit')->middleware('auth');
    Route::put('/settlements/{settlement}', 'update')->middleware('auth');
    Route::delete('/settlements/{settlement}', 'destroy')->middleware('auth');
    Route::get('/settlements/{settlement}', 'show');
});

Route::controller(LegalController::class)->group(function () {
    Route::get('/legals/create', 'create')->middleware('auth');
    Route::post('/legals', 'store')->middleware('auth');
    Route::get('/legals', 'index');
    Route::get('/legals/{legal}/edit', 'edit')->middleware('auth');
    Route::put('/legals/{legal}', 'update')->middleware('auth');
    Route::delete('/legals/{legal}', 'destroy')->middleware('auth');
    Route::get('/legals/{legal}', 'show');
});

Route::controller(GradeController::class)->group(function () {
    Route::get('/grades/create', 'create')->middleware('auth');
    Route::post('/grades', 'store')->middleware('auth');
    Route::get('/grades', 'index');
    Route::get('/grades/{grade}/edit', 'edit')->middleware('auth');
    Route::put('/grades/{grade}', 'update')->middleware('auth');
    Route::delete('/grades/{grade}', 'destroy')->middleware('auth');
    Route::get('/grades/{grade}', 'show');
});

Route::controller(DistrictController::class)->group(function () {
    Route::get('/districts/create', 'create')->middleware('auth');
    Route::post('/districts', 'store')->middleware('auth');
    Route::get('/districts', 'index');
    Route::get('/districts/{district}/edit', 'edit')->middleware('auth');
    Route::put('/districts/{district}', 'update')->middleware('auth');
    Route::delete('/districts/{district}', 'destroy')->middleware('auth');
    Route::get('/districts/{district}', 'show');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies/create', 'create')->middleware('auth');
    Route::post('/companies', 'store')->middleware('auth');
    Route::get('/companies', 'index');
    Route::get('/companies/{company}/edit', 'edit')->middleware('auth');
    Route::put('/companies/{company}', 'update')->middleware('auth');
    Route::delete('/companies/{company}', 'destroy')->middleware('auth');
    Route::get('/companies/{company}', 'show');
});

Route::controller(OwnerController::class)->group(function () {
    Route::get('/owners/create', 'create')->middleware('auth');
    Route::post('/owners', 'store')->middleware('auth');
    Route::get('/owners', 'index');
    Route::get('/owners/{owner}/edit', 'edit')->middleware('auth');
    Route::put('/owners/{owner}', 'update')->middleware('auth');
    Route::delete('/owners/{owner}', 'destroy')->middleware('auth');
    Route::get('/owners/{owner}', 'show');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('/shops/create', 'create')->middleware('auth');
    Route::post('/shops', 'store')->middleware('auth');
    Route::get('/shops', 'index');
    Route::get('/shops/{shop}/edit', 'edit')->middleware('auth');
    Route::put('/shops/{shop}', 'update')->middleware('auth');
    Route::delete('/shops/{shop}', 'destroy')->middleware('auth');
    Route::get('/shops/{shop}', 'show');
});

Route::controller(TrademarkController::class)->group(function () {
    Route::get('/trademarks/create', 'create')->middleware('auth');
    Route::post('/trademarks', 'store')->middleware('auth');
    Route::get('/trademarks', 'index');
    Route::get('/trademarks/{trademark}/edit', 'edit')->middleware('auth');
    Route::put('/trademarks/{trademark}', 'update')->middleware('auth');
    Route::delete('/trademarks/{trademark}', 'destroy')->middleware('auth');
    Route::get('/trademarks/{trademark}', 'show');
});

Route::controller(DeliveryController::class)->group(function () {
    Route::get('/deliveries/create', 'create')->middleware('auth');
    Route::post('/deliveries', 'store')->middleware('auth');
    Route::get('/deliveries', 'index');
    Route::get('/deliveries/{delivery}/edit', 'edit')->middleware('auth');
    Route::put('/deliveries/{delivery}', 'update')->middleware('auth');
    Route::delete('/deliveries/{delivery}', 'destroy')->middleware('auth');
    Route::get('/deliveries/{delivery}', 'show');
});

Route::controller(GoodsController::class)->group(function () {
    Route::get('/goods/create', 'create')->middleware('auth');
    Route::post('/goods', 'store')->middleware('auth');
    Route::get('/goods', 'index');
    Route::get('/goods/{goods_instance}/edit', 'edit')->middleware('auth');
    Route::put('/goods/{goods_instance}', 'update')->middleware('auth');
    Route::delete('/goods/{goods_instance}', 'destroy')->middleware('auth');
    Route::get('/goods/{goods_instance}', 'show');
});
