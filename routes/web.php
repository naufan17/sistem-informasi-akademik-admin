<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\DataAdminController;
use App\Http\Controllers\Administrator\DataMapelController;
use App\Http\Controllers\Administrator\DataSantriController;
use App\Http\Controllers\Administrator\DataUstadzController;

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

Route::multiauth('Administrator', 'administrator');

Route::get('/data-admin', [DataAdminController::class, 'index'])->name('data.admin');
Route::get('/data-mapel', [DataMapelController::class, 'index'])->name('data.mapel');
Route::get('/data-ustadz', [DataUstadzController::class, 'index'])->name('data.ustadz');
Route::get('/data-santri', [DataSantriController::class, 'index'])->name('data.santri');