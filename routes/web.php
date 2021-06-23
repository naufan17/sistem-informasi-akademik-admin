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

Route::get('/administrator/data-admin', [DataAdminController::class, 'index'])->name('administrator.data-admin');
Route::get('/administrator/tambah-data-admin', [DataAdminController::class, 'formTambah'])->name('administrator.tambah-data-admin');

Route::get('/administrator/data-mapel', [DataMapelController::class, 'index'])->name('administrator.data-mapel');
Route::get('/administrator/tambah-data-mapel', [DataMapelController::class, 'formTambah'])->name('administrator.tambah-data-mapel');

Route::get('/administrator/data-ustadz', [DataUstadzController::class, 'index'])->name('administrator.data-ustadz');
Route::get('/administrator/tambah-data-ustadz', [DataUstadzController::class, 'formTambah'])->name('administrator.tambah-data-ustadz');

Route::get('/administrator/data-santri', [DataSantriController::class, 'index'])->name('administrator.data-santri');
Route::get('/administrator/tambah-data-santri', [DataSantriController::class, 'formTambah'])->name('administrator.tambah-data-santri');