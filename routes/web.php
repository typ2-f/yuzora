<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StorageBookController;



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

//Route::get('/',[IndexController::class,'__invoke']);

Route::middleware('auth', 'verified')->group(function () {
    //マイページ
    Route::get('/home', [UserController::class, 'index'])->name('home');

    Route::resource('/books', BookController::class,[
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
    Route::resource('/storages', StorageController::class,[
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

    //任意の書庫内の書籍一覧
    Route::get('/storages/{storage}/books', [StorageBookController::class, '__invoke'])->name('storages.books');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
