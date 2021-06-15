<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/data-admin', function () {
    return view('administrator.data-admin');
});

Route::get('/data-mapel', function () {
    return view('administrator.data-mapel');
});

Route::get('/data-ustadz', function () {
    return view('administrator.data-ustadz');
});

Route::get('/data-santri', function () {
    return view('administrator.data-santri');
});