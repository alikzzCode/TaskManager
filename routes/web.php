<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;

Route::middleware(['auth'])->group(function () {
    Route::prefix('')->group(function () {
        Route::get('', [TaskController::class, 'index'])->name('home.tasks.all');
        Route::get('{task_id}/show', [TaskController::class, 'show'])->name('home.tasks.show');
        Route::put('{task_id}/done', [TaskController::class, 'done'])->name('home.tasks.done');
        Route::get('create', [TaskController::class, 'create'])->name('home.tasks.create');
        Route::post('', [TaskController::class, 'store'])->name('home.tasks.store');
        Route::get('{task_id}/edit', [TaskController::class, 'edit'])->name('home.tasks.edit');
        Route::put('{task_id}/change', [TaskController::class, 'change'])->name('home.tasks.change');
        Route::put('{task_id}/change/master', [TaskController::class, 'changeMaster'])->name('home.tasks.change.master');
        Route::get('{task_id}/comment', [TaskController::class, 'commentAdd'])->name('home.tasks.comment');
        Route::put('{task_id}/update', [TaskController::class, 'store'])->name('home.tasks.update');
        Route::get('{task_id}/download/attachments', [TaskController::class, 'downloadAttachments'])->name('home.tasks.download.attachments');

    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('dashboard')->group(function (){
            Route::get('', [DashboardController::class, 'index'])->name('admin.dash.main');
            Route::get('activities', [DashboardController::class, 'activity'])->name('admin.dash.activity');
            Route::get('Categories', [DashboardController::class, 'category'])->name('admin.dash.category');
        });
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
                Route::get('{task_id}/edit', [TasksController::class, 'edit'])->name('admin.tasks.edit');
                Route::put('{tasks_id}/update', [TasksController::class, 'update'])->name('admin.tasks.update');

            });

            Route::prefix('users')->group(function () {
                Route::get('', [UsersController::class, 'all'])->name('admin.users.all');
                Route::get('create', [UsersController::class, 'create'])->name('admin.users.create');
                Route::post('', [UsersController::class, 'store'])->name('admin.users.store');
                Route::get('{user_id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
                Route::put('{user_id}/update', [UsersController::class, 'update'])->name('admin.users.update');
                Route::delete('{user_id}/delete', [UsersController::class, 'delete'])->name('admin.users.delete');

            });
        });
    });
});
Route::prefix('auth')->group(function () {

    Route::get('login', [LoginController::class, 'show'])->name('auth.login.show');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login.done');
    Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');


});
