<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RestController;




Route::middleware('auth')->group(function () {
    //ログアウト
    Route::get('/logout', [UserController::class, 'logout']);

    //打刻ページ表示
    Route::get('/', [AttendanceController::class, 'stamp']);

    //勤務処理
    Route::post('/atte/start', [AttendanceController::class, 'start']);
    Route::post('/atte/end', [AttendanceController::class, 'end']);

    //休憩処理
    Route::post('/rest/start', [RestController::class, 'start']);
    Route::post('/rest/end', [RestController::class, 'end']);

    //ページネーション
    Route::get('/attendance/{date}', [AttendanceController::class, 'attendance']);
});

//新規会員登録
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

//ログイン
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth']);




Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
