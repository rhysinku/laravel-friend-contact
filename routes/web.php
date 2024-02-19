<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/contact/{id}', [ContactController::class, 'showUser']) ->name('contact.show_user');
Route::get('/contact/{id}/edit', [ContactController::class, 'showEdit']) ->name('contact.edit');
Route::put('/contact/{id}', [ContactController::class, 'update']) ->name('contact.update');


Route::post('/post', [ContactController::class, 'addUser']) ->name('contact.add');
Route::delete('/contact/{id}', [ContactController::class, 'deleteUser']) ->name('contact.destroy');