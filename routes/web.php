<?php

use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;


Route::prefix('')->group(function (){
    Route::get('',[TaskController::class, 'index'])->name('home.tasks.all');
    Route::get('{task_id}/show',[TaskController::class, 'show'])->name('home.tasks.show');

});

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('', [CategoriesController::class, 'all'])->name('admin.categories.all');
        Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::delete('{category_id}/delete', [CategoriesController::class, 'delete'])->name('admin.categories.delete');
        Route::get('{category_id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::put('{category_id}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');

    });

    Route::prefix('tasks')->group(function () {
        Route::get('create', [TasksController::class, 'create'])->name('admin.tasks.create');
        Route::post('', [TasksController::class, 'store'])->name('admin.tasks.store');
        Route::get('', [TasksController::class, 'all'])->name('admin.tasks.all');
        Route::get('{task_id}/download/attachments', [TasksController::class, 'downloadAttachments'])->name('admin.tasks.download.attachments');
        Route::delete('{task_id}/delete', [TasksController::class, 'delete'])->name('admin.tasks.delete');
        Route::get('{task_id}/download/attachments', [TasksController::class, 'downloadAttachments'])->name('admin.tasks.download.attachments');
        Route::get('{task_id}/edit', [TasksController::class, 'edit'])->name('admin.tasks.edit');
        Route::put('{tasks_id}/update', [TasksController::class, 'update'])->name('admin.tasks.update');

    });

    Route::prefix('users')->group(function(){
        Route::get('',[UsersController::class, 'all'])->name('admin.users.all');
        Route::get('create',[UsersController::class, 'create'])->name('admin.users.create');
        Route::post('',[UsersController::class, 'store'])->name('admin.users.store');
        Route::get('{user_id}/edit',[UsersController::class, 'edit'])->name('admin.users.edit');
        Route::put('{user_id}/update',[UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('{user_id}/delete',[UsersController::class, 'delete'])->name('admin.users.delete');

    });

});

