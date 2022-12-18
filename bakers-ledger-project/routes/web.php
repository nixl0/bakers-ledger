<?php

use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;

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


// Route::get('/settlements', [SettlementController::class, 'index']);

// Route::get('/{locale}', function ($locale) {
//     if (! in_array($locale, ['en', 'ru'])) {
//         abort(400);
//     }

//     App::setlocale($locale);
//     return view('home');
// });

Route::redirect('/', '/ru');

Route::group(['prefix' => '{locale}'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/queries', function () {
        return view('queries');
    })->name('queries');

    Route::get('/settlements', [SettlementController::class, 'index'])->name('settlements');

    Route::get('/legals', [SettlementController::class, 'index'])->name('legals');

    Route::get('/grades', [SettlementController::class, 'index'])->name('grades');

    Route::get('/districts', [DistrictController::class, 'index'])->name('districts');

    Route::get('/companies', [SettlementController::class, 'index'])->name('companies');

    Route::get('/users', [SettlementController::class, 'index'])->name('users');

    Route::get('/shops', [SettlementController::class, 'index'])->name('shops');

    Route::get('/deliveries', [SettlementController::class, 'index'])->name('deliveries');

    Route::get('/trademarks', [SettlementController::class, 'index'])->name('trademarks');
});
