<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\VirusController;
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
    return view('halaman.index');
});

// Route FrontEnd
use App\Http\Controllers\HalamanController;
Route::resource('/', HalamanController::class);

Auth::routes();
Route::group(['prefix', 'middleware'=>['auth']], function (){

	Route::resource('/provinsi', ProvinsiController::class);
	Route::resource('/kota', KotaController::class);
	Route::resource('/kelurahan', KelurahanController::class);
	Route::resource('/kecamatan', KecamatanController::class);
    Route::resource('/rw',RwController::class);
    Route::resource('/virus',VirusController::class);    
});
Route::get('/virus', [App\Http\Controllers\VirusController::class, 'index'])->name('virus');


// Route::get('test', function() {
//     return view('frontend.index');
// });