<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\DataAbsensiController;
use App\Http\Controllers\Administrator\DataAdminController;
use App\Http\Controllers\Administrator\DataMapelController;
use App\Http\Controllers\Administrator\DataSantriController;
use App\Http\Controllers\Administrator\DataUstadzController;
use App\Http\Controllers\Administrator\DataKelasController;
use App\Http\Controllers\Administrator\DataKRSController;
use App\Http\Controllers\Administrator\DataNilaiController;
use App\Http\Controllers\Administrator\DataJadwalController;
use App\Http\Controllers\Administrator\DataTingkatController;

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
Route::post('/administrator/data-admin/create', [DataAdminController::class, 'create'])->name('administrator.data-admin.create');
Route::get('/administrator/data-admin/form-update/{id}', [DataAdminController::class, 'formUpdate'])->name('administrator.data-admin.form-update');
Route::post('/administrator/data-admin/update-profile', [DataAdminController::class, 'updateProfile'])->name('administrator.data-admin.update-profile');
Route::post('/administrator/data-admin/update-password', [DataAdminController::class, 'updatePassword'])->name('administrator.data-admin.update-password');
Route::get('/administrator/data-admin/delete/{id}', [DataAdminController::class, 'destroy'])->name('administrator.data-admin.delete');

Route::get('/administrator/data-mapel', [DataMapelController::class, 'index'])->name('administrator.data-mapel');
Route::post('/administrator/data-mapel/filter-status', [DataMapelController::class, 'filterStatus'])->name('administrator.data-mapel.filter-status');
Route::get('/administrator/data-mapel/form-create', [DataMapelController::class, 'formCreate'])->name('administrator.data-mapel.form-create');
Route::post('/administrator/data-mapel/create', [DataMapelController::class, 'create'])->name('administrator.data-mapel.create');
Route::get('/administrator/data-mapel/form-update/{id}', [DataMapelController::class, 'formUpdate'])->name('administrator.data-mapel.form-update');
Route::post('/administrator/data-mapel/update', [DataMapelController::class, 'update'])->name('administrator.data-mapel.update');
Route::get('/administrator/data-mapel/delete/{id}', [DataMapelController::class, 'destroy'])->name('administrator.data-mapel.delete');

Route::get('/administrator/data-ustadz', [DataUstadzController::class, 'index'])->name('administrator.data-ustadz');
Route::post('/administrator/data-ustadz', [DataUstadzController::class, 'filter'])->name('administrator.data-ustadz');
Route::get('/administrator/data-ustadz/detail/{id}', [DataUstadzController::class, 'detailUstadz'])->name('administrator.data-ustadz.detail');
Route::get('/administrator/data-ustadz/form-create', [DataUstadzController::class, 'formCreate'])->name('administrator.data-ustadz.form-create');
Route::post('/administrator/data-ustadz/create', [DataUstadzController::class, 'create'])->name('administrator.data-ustadz.create');
Route::get('/administrator/data-ustadz/form-import', [DataUstadzController::class, 'formImport'])->name('administrator.data-ustadz.form-import');
Route::post('/administrator/data-ustadz/import', [DataUstadzController::class, 'import'])->name('administrator.data-ustadz.import');
Route::get('/administrator/data-ustadz/form-update/{id}', [DataUstadzController::class, 'formUpdate'])->name('administrator.data-ustadz.form-update');
Route::post('/administrator/data-ustadz/update-profile', [DataUstadzController::class, 'updateProfile'])->name('administrator.data-ustadz.update-profile');
Route::post('/administrator/data-ustadz/update-password', [DataUstadzController::class, 'updatePassword'])->name('administrator.data-ustadz.update-password');
Route::get('/administrator/data-ustadz/delete/{id}', [DataUstadzController::class, 'destroy'])->name('administrator.data-ustadz.delete');

Route::get('/administrator/data-santri', [DataSantriController::class, 'index'])->name('administrator.data-santri');
Route::post('/administrator/data-santri', [DataSantriController::class, 'filter'])->name('administrator.data-santri');
Route::get('/administrator/data-santri/detail/{id}', [DataSantriController::class, 'detailSantri'])->name('administrator.data-santri.detail');
Route::get('/administrator/data-santri/form-create', [DataSantriController::class, 'formCreate'])->name('administrator.data-santri.form-create');
Route::post('/administrator/data-santri/create', [DataSantriController::class, 'create'])->name('administrator.data-santri.create');
Route::get('/administrator/data-santri/form-import', [DataSantriController::class, 'formImport'])->name('administrator.data-santri.form-import');
Route::post('/administrator/data-santri/import', [DataSantriController::class, 'import'])->name('administrator.data-santri.import');
Route::get('/administrator/data-santri/form-update/{id}', [DataSantriController::class, 'formUpdate'])->name('administrator.data-santri.form-update');
Route::post('/administrator/data-santri/update-profile', [DataSantriController::class, 'updateProfile'])->name('administrator.data-santri.update-profile');
Route::post('/administrator/data-santri/update-password', [DataSantriController::class, 'updatePassword'])->name('administrator.data-santri.update-password');
Route::get('/administrator/data-santri/delete/{id}', [DataSantriController::class, 'destroy'])->name('administrator.data-santri.delete');

Route::get('/administrator/data-krs', [DataKRSController::class, 'index'])->name('administrator.data-krs');
Route::get('/administrator/data-krs/form-create/{id}', [DataKRSController::class, 'formCreate'])->name('administrator.data-krs.form-create');
Route::post('/administrator/data-krs/create', [DataKRSController::class, 'create'])->name('administrator.data-krs.create');
Route::get('/administrator/data-krs/delete/{id}', [DataKRSController::class, 'delete'])->name('administrator.data-krs.delete');

Route::get('/administrator/data-kelas', [DataKelasController::class, 'index'])->name('administrator.data-kelas');
Route::post('/administrator/data-kelas', [DataKelasController::class, 'filter'])->name('administrator.data-kelas');
Route::get('/administrator/data-kelas/detail/{id}', [DataKelasController::class, 'detailKelas'])->name('administrator.data-kelas.detail');
Route::post('/administrator/data-kelas/create', [DataKelasController::class, 'createNilai'])->name('administrator.data-kelas.create');

Route::get('/administrator/data-nilai', [DataNilaiController::class, 'index'])->name('administrator.data-nilai');
Route::get('/administrator/data-nilai/form-create/{id}', [DataNilaiController::class, 'formCreate'])->name('administrator.data-nilai.form-create');
Route::post('/administrator/data-nilai/create', [DataNilaiController::class, 'create'])->name('administrator.data-nilai.create');

Route::get('/administrator/data-absensi', [DataAbsensiController::class, 'index'])->name('administrator.data-absensi');
Route::get('/administrator/data-absensi/list/{id}', [DataAbsensiController::class, 'listAbsensi'])->name('administrator.data-absensi.list');
Route::get('/administrator/data-absensi/form-create/{id}', [DataAbsensiController::class, 'formCreate'])->name('administrator.data-absensi.form-create');
Route::post('/administrator/data-absensi/create', [DataAbsensiController::class, 'create'])->name('administrator.data-absensi.create');
Route::get('/administrator/data-absensi/form-update/{id}', [DataAbsensiController::class, 'formUpdate'])->name('administrator.data-absensi.form-update');
Route::post('/administrator/data-absensi/update', [DataAbsensiController::class, 'update'])->name('administrator.data-absensi.update');
Route::get('/administrator/data-absensi/delete/{id}', [DataAbsensiController::class, 'delete'])->name('administrator.data-absensi.delete');

Route::get('/administrator/data-jadwal', [DataJadwalController::class, 'index'])->name('administrator.data-jadwal');
Route::post('/administrator/data-jadwal', [DataJadwalController::class, 'filterHari'])->name('administrator.data-jadwal');
Route::get('/administrator/data-jadwal/form-create', [DataJadwalController::class, 'formCreate'])->name('administrator.data-jadwal.form-create');
Route::post('/administrator/data-jadwal/create', [DataJadwalController::class, 'create'])->name('administrator.data-jadwal.create');
Route::get('/administrator/data-jadwal/form-update/{id}', [DataJadwalController::class, 'formUpdate'])->name('administrator.data-jadwal.form-update');
Route::post('/administrator/data-jadwal/update', [DataJadwalController::class, 'update'])->name('administrator.data-jadwal.update');
Route::get('/administrator/data-jadwal/delete/{id}', [DataJadwalController::class, 'delete'])->name('administrator.data-jadwal.delete');

Route::get('/administrator/data-tingkat', [DataTingkatController::class, 'index'])->name('administrator.data-tingkat');
Route::post('/administrator/data-tingkat', [DataTingkatController::class, 'filterNamaTingkat'])->name('administrator.data-jadwal');
Route::get('/administrator/data-tingkat/form-create', [DataTingkatController::class, 'formCreate'])->name('administrator.data-tingkat.form-create');
Route::post('/administrator/data-tingkat/create', [DataTingkatController::class, 'create'])->name('administrator.data-tingkat.create');
Route::get('/administrator/data-tingkat/form-update/{id}', [DataTingkatController::class, 'formUpdate'])->name('administrator.data-tingkat.form-update');
Route::post('/administrator/data-tingkat/update', [DataTingkatController::class, 'update'])->name('administrator.data-tingkat.update');
Route::get('/administrator/data-tingkat/delete/{id}', [DataTingkatController::class, 'delete'])->name('administrator.data-tingkat.delete');