<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use GuzzleHttp\Psr7\Request;

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

Route::get('test', [MainController::class, 'testGet']);

Route::get('/', function () {
    return view('welcome');
});


// Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/home', [MainController::class, 'home'])->name('home');
// Route::view('/home', 'home')->name('home');
// Route::view('/home', 'home');
// Route::view('/home', 'home');
Route::view('/login', 'login');
Route::get('/profile', function () {
    return redirect('home');
})->name('profile');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');
