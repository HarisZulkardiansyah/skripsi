<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Doctrine\DBAL\Driver\Middleware;
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
    return view('welcome',[
        "title" => 'home'
    ]);
});

// Route::get('/home', function () {
//     return view('home',[
//         "title" => 'home'
//     ]);
// });

Route::get('/perhitungan', function () {
    return view('perhitungan',[
        "title" => 'perhitungan'
    ]);
});
Route::resource('kriteria', KriteriaController::class)->middleware('auth');
Route::resource('alternatif', AlternatifController::class)->middleware('auth');

route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
route::post('/login',[LoginController::class,'authenticate']);
route::get('/home', [HomeController::class,'index'])->middleware('auth');
route::post('/logout', [LoginController::class,'logout']);