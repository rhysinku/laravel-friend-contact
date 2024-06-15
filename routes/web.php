<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::get('/', [ContactController::class, 'displayUser']) ->name('home');

Route::get('/contact/{id}', [ContactController::class, 'showUser']) ->name('contact.show_user')->middleware('auth');
Route::get('/contact/{id}/edit', [ContactController::class, 'showEdit']) ->name('contact.edit')->middleware('auth');
Route::put('/contact/{id}', [ContactController::class, 'update']) ->name('contact.update')->middleware('auth');


Route::post('/post', [ContactController::class, 'addUser']) ->name('contact.add')->middleware('auth');
Route::delete('/contact/{id}', [ContactController::class, 'deleteUser']) ->name('contact.destroy')->middleware('auth');


Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class,'store'])->name('auth.register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('auth.login');

Route::post('/logout' ,[AuthController::class, 'logout'])->name('auth.logout');