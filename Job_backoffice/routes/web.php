<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('applications', ApplicationController::class);

    // archived route
    Route::get('/categories/archived',[CategoryController::class,'archived'])->name('categories.archived');
    Route::patch('/categories/{category}/restore',[CategoryController::class,'restore'])->withTrashed()->name('categories.restore');
    Route::resource('categories', CategoryController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('vacancies', VacancyController::class);
    Route::resource('users',UserController::class);
});

require __DIR__.'/auth.php';
