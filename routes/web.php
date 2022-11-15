<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/test',[AuthController::class,'test']);

Route::get('/registeration', [AuthController::class, 'loadRegister'])->name('loadRegister');
Route::post('/registeration', [AuthController::class, 'studentRegister'])->name('studentRegister');

Route::get('/login',function(){
return redirect('/');
});

Route::get('/', [AuthController::class, 'loadlogin'])->name('loadlogin');
Route::post('/login', [AuthController::class, 'userLogin'])->name('userLogin');
Route::get('logout', [AuthController::class, 'userLogout'])->name('userLogout');

Route::group(['middleware' => ['web', 'cheakAdmin']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard']);
});

Route::group(['middleware' => ['web', 'cheakStudent']], function () {
    Route::get('/dashboard', [AuthController::class, 'loadDashboard']);
});
