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
Route::get('/administrator/data-admin/form-create', [DataAdminController::class, 'formCreate'])->name('administrator.data-admin.form-create');
Route::get('/administrator/data-admin/create', [DataAdminController::class, 'create'])->name('administrator.data-admin.create');
Route::get('/administrator/data-admin/form-update/{id}', [DataAdminController::class, 'formUpdate'])->name('administrator.data-admin.form-update');
Route::get('/administrator/data-admin/update-profile', [DataAdminController::class, 'updateProfile'])->name('administrator.data-admin.update-profile');
Route::get('/administrator/data-admin/update-password', [DataAdminController::class, 'updatePassword'])->name('administrator.data-admin.update-password');
Route::get('/administrator/data-admin/delete/{id}', [DataAdminController::class, 'destroy'])->name('administrator.data-admin.delete');

Route::get('/administrator/data-mapel/filter', [DataMapelController::class, 'filter'])->name('administrator.data-mapel.filter');
Route::get('/administrator/data-mapel', [DataMapelController::class, 'index'])->name('administrator.data-mapel');
Route::get('/administrator/data-mapel/form-create', [DataMapelController::class, 'formCreate'])->name('administrator.data-mapel.form-create');
Route::get('/administrator/data-mapel/create', [DataMapelController::class, 'create'])->name('administrator.data-mapel.create');
Route::get('/administrator/data-mapel/form-update/{id}', [DataMapelController::class, 'formUpdate'])->name('administrator.data-mapel.form-update');
Route::get('/administrator/data-mapel/update', [DataMapelController::class, 'update'])->name('administrator.data-mapel.update');

Route::get('/administrator/filter-ustadz', [DataUstadzController::class, 'filter'])->name('administrator.filter-ustadz');
Route::get('/administrator/data-ustadz', [DataUstadzController::class, 'index'])->name('administrator.data-ustadz');
Route::get('/administrator/data-ustadz/form-create', [DataUstadzController::class, 'formStore'])->name('administrator.data-ustadz.form-create');
Route::get('/administrator/data-ustadz/create', [DataUstadzController::class, 'store'])->name('administrator.data-ustadz.create');
Route::get('/administrator/data-ustadz/form-update/{id}', [DataUstadzController::class, 'formUpdate'])->name('administrator.data-ustadz.form-update');
Route::get('/administrator/data-ustadz/update-profile', [DataUstadzController::class, 'updateProfile'])->name('administrator.data-ustadz.update-profile');
Route::get('/administrator/data-ustadz/update-password', [DataUstadzController::class, 'updatePassword'])->name('administrator.data-ustadz.update-password');
Route::get('/administrator/data-ustadz/delete/{id}', [DataUstadzController::class, 'destroy'])->name('administrator.data-ustadz.delete');

Route::get('/administrator/filter-santri', [DataSantriController::class, 'filter'])->name('administrator.filter-santri');
Route::get('/administrator/data-santri', [DataSantriController::class, 'index'])->name('administrator.data-santri');
Route::get('/administrator/data-santri/form-create', [DataSantriController::class, 'formStore'])->name('administrator.data-santri.form-create');
Route::get('/administrator/data-santri/create', [DataSantriController::class, 'store'])->name('administrator.data-santri.create');
Route::get('/administrator/data-santri/form-update/{id}', [DataSantriController::class, 'formUpdate'])->name('administrator.data-santri.form-update');
Route::get('/administrator/data-santri/update-profile', [DataSantriController::class, 'updateProfile'])->name('administrator.data-santri.update-profile');
Route::get('/administrator/data-santri/update-password', [DataSantriController::class, 'updatePassword'])->name('administrator.data-santri.update-password');
Route::get('/administrator/data-santri/delete/{id}', [DataSantriController::class, 'destroy'])->name('administrator.data-santri.delete');