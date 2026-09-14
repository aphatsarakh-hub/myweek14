<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClaimController;

// routes/web.php
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('detail/{id}', [BlogController::class, 'detail']);


Route::get('/about', function () {
    return view('about', [
        'name' => 'นางสาวอภัสรา แคะมะดัน',
        'date' => '8 พฤศจิกายน 2547',
    ]);
})->name('about');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog2', [AdminController::class, 'blog2'])->name('blog2');
Route::get('/from', [AdminController::class, 'create'])->name('from');
Route::post('/insert', [AdminController::class, 'insert'])->name('insert');

// Author prefix routes
Route::prefix('author')->group(function () {
    Route::get('/blog2', [AdminController::class, 'blog2'])->name('author.blog2');
    Route::get('/create', [AdminController::class, 'create'])->name('author.create');
    Route::post('/insert', [AdminController::class, 'insert'])->name('author.insert');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('author.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('author.update');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('author.delete');
    Route::get('/change/{id}', [AdminController::class, 'change'])->name('author.change');
});

// ลบ route ซ้ำออก (ใช้ prefix group ด้านบนแทน)

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();

        return "เชื่อมต่อฐานข้อมูลสำเร็จ : "
            . DB::connection()->getDatabaseName();

    } catch (\Exception $e) {

        return "เชื่อมต่อฐานข้อมูลไม่สำเร็จ : "
            . $e->getMessage();
    }
});

Route::get('/student/{id}', function ($id) {
    return view('student', ['id' => $id]);
})->name('student.profile');

Route::get('/claim', [ClaimController::class, 'create'])->name('claim.create');
Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');

Route::get('/blog/{id}/status', [AdminController::class, 'change'])->name('blog.changeStatus');
Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');

Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');

Route::get('/blog/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('delete');

Route::fallback(function () {
    return 'ไม่พบหน้าเว็บ';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');