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

    // application and archive
    Route::resource('applications', ApplicationController::class);

    // category and archived
    Route::get('/categories/archived',[CategoryController::class,'archived'])->name('categories.archived');
    Route::patch('/categories/{category}/restore',[CategoryController::class,'restore'])->withTrashed()->name('categories.restore');
    Route::delete('/categories/{category}/archived',[CategoryController::class,'forceDelete'])->name('categories.forceDelete')->withTrashed();
    Route::resource('categories', CategoryController::class);

    // company and archive
    Route::get('/companies/archived',[CompanyController::class,'archived'])->name('companies.archived');
    Route::patch('/companies/{company}/restore',[CompanyController::class,'restore'])->withTrashed()->name('companies.restore');
    Route::delete('/companies/{company}/archived',[CompanyController::class,'forceDelete'])->name('companies.forceDelete')->withTrashed();
    Route::resource('companies', CompanyController::class);

    //vacancy and archive
    Route::resource('vacancies', VacancyController::class);

    //user and archive
    Route::resource('users',UserController::class);
});

require __DIR__.'/auth.php';
