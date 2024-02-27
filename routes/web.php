<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chatController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/chat/{id?}',[chatController::class,'userChat']);
Route::post('/addMessage',[chatController::class,'addMessage']);
Route::get('/signup',[chatController::class,'user']);
Route::post('/signup',[chatController::class,'addChat']);
Route::get('/login',[chatController::class,'loginUser']);
Route::post('/login',[chatController::class,'loginChat']);
