<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Models\Phones;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------          

|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('testAuth', [AuthController::class, 'testAuth']);
Route::get('test', [MainController::class, 'testGet']);

// Route::get('home', function () {
//     return view('home');
// })->name('home');


Route::post('test', [MainController::class, 'testPost']);
Route::get('getData', [MainController::class, 'getData'])->name('give_me_data_plz');
Route::post('postData', [MainController::class, 'postData']);
Route::get('getFake', [MainController::class, 'getFake']);
// Route::permanentRedirect('get_1', 'get_2');
Route::get('get_1', [MainController::class, 'get_1']);
// return redirect()->route('profile');

Route::view('/welcome', 'welcome');
Route::get('/user/{id}', [MainController::class, 'get_1']);
Route::get('test/get_2', [MainController::class, 'get_2']);
Route::get('/model/user/{user}', function ($user) {
    return $user;
});
Route::get('/users/{user}/phones/{phone}', function (User $user, Phones $phone) {
    return $phone;
});

Route::get('getRoute', [MainController::class, 'getRoute']);
// Route::view('/home', 'home')->middleware('testToken');

// Route::middleware('testToken')->group(function () {
//     Route::view('/home', 'home')->withoutMiddleware('testToken');
// });

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
    return $token;
    // ...
});

Route::apiResource('users', UserController::class);



// Route::view('/home', 'home')->middleware('testToken');

Route::get('/psr', [MainController::class, 'getPsr']);


Route::fallback([MainController::class, 'fallback']);
