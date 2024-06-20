<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware('web')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('/', [AuthController::class, 'login'])->name('login');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', function () {
        return view('home');
    })->middleware('auth')->name('home');


    Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('categories/create',[CategoryController::class,'create']);
Route::post('categories/store', [CategoryController::class,'store'])->name('categories.store');
Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');
Route::put('categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
Route::get('categories/{category}/editar',[CategoryController::class,'edit'])->name('categories.edit');
});
