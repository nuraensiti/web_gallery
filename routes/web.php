<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

//Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

//Route untuk pengunjung yang sudah login
Route::middleware('auth')->group(function() {
    // Route untuk menampilkan dashboard admin
Route::get('/admin', function(){
    return view('admin.dashboard.index', [
        'title' => 'Dashboard',
    ]);
});

 
// Route untuk menampilkan halaman manajemen admin
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Changed to GET

Route::post('/users', [UserController::class, 'store'])->name('users.store'); // This is for storing user data

Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/hapus/{id}', [UserController::class, 'destroy'])->name('users.hapus');

//Route untuk logout
Route::get('/logout', [AuthController::class, 'logout']);

//route untuk CRUD category
Route::resource('categories', CategoryController::class);

// Route untuk CRUD post
Route::resource('posts', PostController::class);
});


