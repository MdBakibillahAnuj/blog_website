<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware', ['auth:sanctum', 'verified']], function (){
    Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
    Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');


    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('add-blog');
    Route::post('/new-blog', [BlogController::class, 'newBlog'])->name('new-blog');
    Route::get('/manage-blog', [BlogController::class, 'manageBlog'])->name('manage-blog');
    Route::get('/edit-blog/{id}/{title}', [BlogController::class, 'editBlog'])->name('edit-blog');
//    Route::post('/update-blog/', [BlogController::class, 'updateBlog'])->name('update-blog');
});
