<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login.do');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.view');

Route::prefix('product')->group(function(){
    Route::get('/list', function(){
        print("<h1>Proudct LIst Page</h1>");
    })->name('product.list');
    Route::get('/detail/{productId}', function($productId){
        print("<h1>Proudct Detail $productId Page</h1>");
    })->name('product.detail');
});
Route::get('/about', [AboutController::class, 'index']);
Route::redirect('kontak-kami', '/about');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('students')->name('students.')->group(function(){
    Route::get('/create', [StudentController::class, 'showCreate'])->name('create');
    Route::post('/create', [StudentController::class, 'insertStudent'])->name('insert');
    Route::get('/update/{id}', [StudentController::class, 'showEdit'])->name('edit');
    Route::patch('/update/{id}', [StudentController::class, 'updateStudent'])->name('update');
    Route::get('/{id}', [StudentController::class, 'detail'])->name('detail');
});
