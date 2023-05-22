<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Storageontroller;
use App\Http\Controllers\BookInStorageController;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/',[IndexController::class,'index']);

Route::middleware('auth')->group(function () {
    //マイページ
    Route::get('/home', [UserController::class, 'index'])->name('home');

    //書籍
    Route::resource('/books', BookController::class, [
        'names' => [
            'index' => 'books.index',
            'create' => 'books.create',
            'store' => 'books.store',
            'show' => 'books.show',
            'edit' => 'books.edit',
            'update' => 'books.update',
            'destroy' => 'books.destroy',
        ]
    ]);

    //書庫
    Route::resource('/storages', StorageController::class, [
        'names' => [
            'index' => 'storages.index',
            'create' => 'storages.create',
            'store' => 'storages.store',
            'show' => 'storages.show',
            'edit' => 'storages.edit',
            'update' => 'storages.update',
            'destroy' => 'storages.destroy',
        ]
    ]);

    
    Route::get('/storages/{id}', [BookInStorageController::class, 'index']);
    Route::get('/storages/{id}/edit', [BookInStorageController::class, 'index']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
