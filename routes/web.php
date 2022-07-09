<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrator\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrator\Auth\NewPasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrator\Auth\RegisteredUserController;
use App\Http\Controllers\Administrator\Auth\VerifyEmailController;
use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\DataAbsensiController;
use App\Http\Controllers\Administrator\DataAdminController;
use App\Http\Controllers\Administrator\DataMapelController;
use App\Http\Controllers\Administrator\DataSantriController;
use App\Http\Controllers\Administrator\DataUstadzController;
use App\Http\Controllers\Administrator\DataKRSController;
use App\Http\Controllers\Administrator\DataNilaiController;
use App\Http\Controllers\Administrator\DataJadwalController;
use App\Http\Controllers\Administrator\DataKelasController;

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

// Route::multiauth('Administrator', 'administrator');

Route::prefix('administrator')->name('administrator.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administrator');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administrator')
        ->name('dashboard');
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:administrator');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrator');
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:administrator')
        ->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:administrator')
        ->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:administrator')
        ->name('password.update');
    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:administrator')
        ->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:administrator', 'signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:administrator', 'throttle:6,1'])
        ->name('verification.send');
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:administrator')
        ->name('password.confirm');
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:administrator');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrator')
        ->name('logout');
});

Route::get('/administrator/data-admin', [DataAdminController::class, 'index'])
    ->name('administrator.data-admin');
Route::get('/administrator/data-admin/form-create', [DataAdminController::class, 'formCreate'])
    ->name('administrator.data-admin.form-create');
Route::post('/administrator/data-admin/create', [DataAdminController::class, 'create'])
    ->name('administrator.data-admin.create');
Route::get('/administrator/data-admin/form-update/{id}', [DataAdminController::class, 'formUpdate'])
    ->name('administrator.data-admin.form-update');
Route::post('/administrator/data-admin/update-profile', [DataAdminController::class, 'updateProfile'])
    ->name('administrator.data-admin.update-profile');
Route::post('/administrator/data-admin/update-password', [DataAdminController::class, 'updatePassword'])
    ->name('administrator.data-admin.update-password');
Route::get('/administrator/data-admin/delete/{id}', [DataAdminController::class, 'destroy'])
    ->name('administrator.data-admin.delete');

Route::get('/administrator/data-mapel', [DataMapelController::class, 'index'])
    ->name('administrator.data-mapel');
Route::post('/administrator/data-mapel', [DataMapelController::class, 'filterKelas'])
    ->name('administrator.data-mapel');
// Route::post('/administrator/data-mapel', [DataMapelController::class, 'filterStatus'])
//    ->name('administrator.data-mapel');
Route::get('/administrator/data-mapel/form-create', [DataMapelController::class, 'formCreate'])
    ->name('administrator.data-mapel.form-create');
Route::post('/administrator/data-mapel/create', [DataMapelController::class, 'create'])
    ->name('administrator.data-mapel.create');
Route::get('/administrator/data-mapel/form-update/{id}', [DataMapelController::class, 'formUpdate'])
    ->name('administrator.data-mapel.form-update');
Route::post('/administrator/data-mapel/update', [DataMapelController::class, 'update'])
    ->name('administrator.data-mapel.update');
Route::get('/administrator/data-mapel/delete/{id}', [DataMapelController::class, 'destroy'])
    ->name('administrator.data-mapel.delete');

Route::get('/administrator/data-ustadz', [DataUstadzController::class, 'index'])
    ->name('administrator.data-ustadz');
Route::post('/administrator/data-ustadz', [DataUstadzController::class, 'filter'])
    ->name('administrator.data-ustadz');
Route::get('/administrator/data-ustadz/detail/{id}', [DataUstadzController::class, 'detailUstadz'])
    ->name('administrator.data-ustadz.detail');
Route::get('/administrator/data-ustadz/form-create', [DataUstadzController::class, 'formCreate'])
    ->name('administrator.data-ustadz.form-create');
Route::post('/administrator/data-ustadz/create', [DataUstadzController::class, 'create'])
    ->name('administrator.data-ustadz.create');
Route::get('/administrator/data-ustadz/form-import', [DataUstadzController::class, 'formImport'])
    ->name('administrator.data-ustadz.form-import');
Route::post('/administrator/data-ustadz/import', [DataUstadzController::class, 'import'])
    ->name('administrator.data-ustadz.import');
Route::get('/administrator/data-ustadz/form-update/{id}', [DataUstadzController::class, 'formUpdate'])
    ->name('administrator.data-ustadz.form-update');
Route::post('/administrator/data-ustadz/update-profile', [DataUstadzController::class, 'updateProfile'])
    ->name('administrator.data-ustadz.update-profile');
Route::post('/administrator/data-ustadz/update-password', [DataUstadzController::class, 'updatePassword'])
    ->name('administrator.data-ustadz.update-password');
Route::get('/administrator/data-ustadz/delete/{id}', [DataUstadzController::class, 'destroy'])
    ->name('administrator.data-ustadz.delete');
Route::get('/administrator/data-ustadz/sample-import', [DataUstadzController::class, 'sampleImport'])
    ->name('administrator.data-ustadz.sample-import');

Route::get('/administrator/data-santri', [DataSantriController::class, 'index'])
    ->name('administrator.data-santri');
Route::post('/administrator/data-santri', [DataSantriController::class, 'filter'])
    ->name('administrator.data-santri');
Route::post('/administrator/data-santri/filter-status', [DataSantriController::class, 'filterStatus'])
    ->name('administrator.data-santri/filter-status');
Route::get('/administrator/data-santri/detail/{id}', [DataSantriController::class, 'detailSantri'])
    ->name('administrator.data-santri.detail');
Route::get('/administrator/data-santri/form-create', [DataSantriController::class, 'formCreate'])
    ->name('administrator.data-santri.form-create');
Route::post('/administrator/data-santri/create', [DataSantriController::class, 'create'])
    ->name('administrator.data-santri.create');
Route::get('/administrator/data-santri/form-import', [DataSantriController::class, 'formImport'])
    ->name('administrator.data-santri.form-import');
Route::post('/administrator/data-santri/import', [DataSantriController::class, 'import'])
    ->name('administrator.data-santri.import');
Route::get('/administrator/data-santri/form-update/{id}', [DataSantriController::class, 'formUpdate'])
    ->name('administrator.data-santri.form-update');
Route::post('/administrator/data-santri/update-profile', [DataSantriController::class, 'updateProfile'])
    ->name('administrator.data-santri.update-profile');
Route::post('/administrator/data-santri/update-password', [DataSantriController::class, 'updatePassword'])
    ->name('administrator.data-santri.update-password');
Route::get('/administrator/data-santri/delete/{id}', [DataSantriController::class, 'destroy'])
    ->name('administrator.data-santri.delete');
Route::get('/administrator/data-santri/sample-import', [DataSantriController::class, 'sampleImport'])
    ->name('administrator.data-santri.sample-import');

Route::get('/administrator/data-krs', [DataKRSController::class, 'index'])
    ->name('administrator.data-krs');
Route::post('/administrator/data-krs', [DataKRSController::class, 'filter'])
    ->name('administrator.data-krs');
Route::get('/administrator/data-krs/form-create/{id}', [DataKRSController::class, 'formCreate'])
    ->name('administrator.data-krs.form-create');
Route::post('/administrator/data-krs/form-create/filter-semester', [DataKRSController::class, 'filterSemester'])
    ->name('administrator.data-krs.form-create.filter-semester');
Route::post('/administrator/data-krs/create', [DataKRSController::class, 'create'])
    ->name('administrator.data-krs.create');
Route::post('/administrator/data-krs/form-create/filter-kelas', [DataKRSController::class, 'filterKelas'])
    ->name('administrator.data-krs.form-create.filter-kelas');
Route::get('/administrator/data-krs/delete/{id}', [DataKRSController::class, 'delete'])
    ->name('administrator.data-krs.delete');

Route::get('/administrator/data-nilai', [DataNilaiController::class, 'index'])
    ->name('administrator.data-nilai');
Route::post('/administrator/data-nilai', [DataNilaiController::class, 'filter'])
    ->name('administrator.data-nilai');
Route::get('/administrator/data-nilai/santri/{id}', [DataNilaiController::class, 'santriNilai'])
    ->name('administrator.data-nilai.santri');
Route::post('/administrator/data-nilai/santri', [DataNilaiController::class, 'filterSemester'])
    ->name('administrator.data-nilai');
Route::post('/administrator/data-nilai/create', [DataNilaiController::class, 'createNilai'])
    ->name('administrator.data-nilai.create');

Route::get('/administrator/data-absensi', [DataAbsensiController::class, 'index'])
    ->name('administrator.data-absensi');
Route::post('/administrator/data-absensi', [DataAbsensiController::class, 'filter'])
    ->name('administrator.data-absensi');
Route::get('/administrator/data-absensi/list/{id}', [DataAbsensiController::class, 'listAbsensi'])
    ->name('administrator.data-absensi.list');
Route::get('/administrator/data-absensi/form-create/{id}', [DataAbsensiController::class, 'formCreate'])
    ->name('administrator.data-absensi.form-create');
Route::post('/administrator/data-absensi/create', [DataAbsensiController::class, 'create'])
    ->name('administrator.data-absensi.create');
Route::get('/administrator/data-absensi/form-update/{id}', [DataAbsensiController::class, 'formUpdate'])
    ->name('administrator.data-absensi.form-update');
Route::post('/administrator/data-absensi/update', [DataAbsensiController::class, 'update'])
    ->name('administrator.data-absensi.update');
Route::get('/administrator/data-absensi/delete/{id}', [DataAbsensiController::class, 'delete'])
    ->name('administrator.data-absensi.delete');

Route::get('/administrator/data-jadwal', [DataJadwalController::class, 'index'])
    ->name('administrator.data-jadwal');
Route::post('/administrator/data-jadwal', [DataJadwalController::class, 'filterKelas'])
    ->name('administrator.data-jadwal');
Route::post('/administrator/data-jadwal/filter-hari', [DataJadwalController::class, 'filterHari'])
    ->name('administrator.data-jadwal.filter-hari');
Route::get('/administrator/data-jadwal/form-create', [DataJadwalController::class, 'formCreate'])
    ->name('administrator.data-jadwal.form-create');
Route::post('/administrator/data-jadwal/create', [DataJadwalController::class, 'create'])
    ->name('administrator.data-jadwal.create');
Route::get('/administrator/data-jadwal/form-update/{id}', [DataJadwalController::class, 'formUpdate'])
    ->name('administrator.data-jadwal.form-update');
Route::post('/administrator/data-jadwal/update', [DataJadwalController::class, 'update'])
    ->name('administrator.data-jadwal.update');
Route::get('/administrator/data-jadwal/delete/{id}', [DataJadwalController::class, 'delete'])
    ->name('administrator.data-jadwal.delete');

Route::get('/administrator/data-kelas', [DataKelasController::class, 'index'])
    ->name('administrator.data-kelas');
Route::post('/administrator/data-kelas', [DataKelasController::class, 'filter'])
    ->name('administrator.data-kelas');
Route::get('/administrator/data-kelas/form-create', [DataKelasController::class, 'formCreate'])
    ->name('administrator.data-kelas.form-create');
Route::post('/administrator/data-kelas/create', [DataKelasController::class, 'create'])
    ->name('administrator.data-kelas.create');
Route::get('/administrator/data-kelas/form-update/{id}', [DataKelasController::class, 'formUpdate'])
    ->name('administrator.data-kelas.form-update');
Route::post('/administrator/data-kelas/update', [DataKelasController::class, 'update'])
    ->name('administrator.data-kelas.update');
Route::get('/administrator/data-kelas/delete/{id}', [DataKelasController::class, 'delete'])
    ->name('administrator.data-kelas.delete');