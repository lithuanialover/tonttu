<?php

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



#---------------------------------------------------------------------------------

// Route::get('/', function () {
//     return view('welcome');
// });

#CRUDのチュートリアル
// use App\Http\Controllers\ProductController;
// Route::resource('products', ProductController::class);