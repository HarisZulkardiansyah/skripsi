<?php

use App\Http\Controllers\BobotAhp;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BobotAhpController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerangkinganController;

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

// Success
Route::resource('kriteria', KriteriaController::class)->middleware('auth');
Route::get('/bobot-ahp', [BobotAhpController::class,'index'])->name('bobot_ahp')->middleware('auth');
Route::post('/bobot-ahp-store', [BobotAhpController::class,'store'])->name('bobot_ahp_up')->middleware('auth');
//Ranking
Route::get('/ranking',[PerangkinganController::class,'index'])->name('ranking')->middleware('auth');

//
Route::resource('alternatif', AlternatifController::class)->middleware('auth');

route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
route::post('/login',[LoginController::class,'authenticate']);
route::get('/home', [HomeController::class,'index'])->middleware('auth');
route::post('/logout', [LoginController::class,'logout']);