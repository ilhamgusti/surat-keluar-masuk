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

Auth::routes();

// when render first time project redirect
Route::redirect('/', '/login');



Route::group([
    'middleware' => 'auth:web'
],function (){
    Route::get('/logout', 'RedirectController@logout');
    // when render first time project redirect
    Route::get('/home', 'RedirectController@index');
    Route::resources([
        'surat' => SuratController::class,
    ]);
    Route::get('/archive', 'SuratController@archive')->name('surat.archive');
    Route::get('/archive/{surat}', 'SuratController@archiveDetail')->name('surat.show.archive');
    Route::put('/surat/update-status/{surat}', 'SuratController@updateStatus')->name('surat.update-status');
});
