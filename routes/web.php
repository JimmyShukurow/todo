<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjaxController;
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
// Home page route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/logout', [HomeController::class, 'logout']);

// Ajax functions
Route::post('/addingToList', [AjaxController::class, 'save'] )->name('addToList'); 
Route::post('/login', [AjaxController::class, 'login']);
Route::post('/register', [AjaxController::class, 'register']);
Route::post('/deleteDetails',[AjaxController::class, 'deleteDetails']);
Route::post('/saveDetails',[AjaxController::class, 'saveDetails']);
