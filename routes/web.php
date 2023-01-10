<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// LP
Route::prefix('tonttu')->group(function () {

    Route::get('', function () {
        return view('lp');
    });

});

#---------------------------------------------------------------------------------

// 会員
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 園児情報のCRUD
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('qrcode/{id}', [StudentController::class, 'generate'])->name('generate');
    Route::get('/pdf/{id}', [StudentController::class, 'pdf'])->name('pdf');
});

require __DIR__.'/auth.php';//会員

#---------------------------------------------------------------------------------

// 管理者
Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.auth.dashboard');//ここにauth足したらいけるのでは
    })->middleware(['auth:admin'])->name('dashboard');

    require __DIR__.'/admin.php';
});

Route::middleware('auth:admin')->group(function () {

    Route::get('/attendance/list', [AttendanceController::class, 'index'])->name('attendanceList');

# 登園管理
    Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance'); //QRリーダー表示

    Route::get('/attendance/{id}',[AttendanceController::class, 'attendanceAjax'])->name('attendanceAjax');// Ajaxで実行するメソッドのルーティング

    Route::post('/punchin', [AttendanceController::class, 'punchIn'])->name('punchIn'); //「登園」をDBに登録

#降園管理
    Route::get('/leave', [AttendanceController::class, 'leave'])->name('leave');

    Route::post('/punchout', [AttendanceController::class, 'punchOut'])->name('punchOut'); //「降園」をDBに登録


    // require __DIR__.'/admin.php';//これをいれるとtoo many directsエラーでる
});

// require __DIR__.'/admin.php'; #こいつが原因で「保護者用login/registerに飛べなかった」ここに書いたらダメ