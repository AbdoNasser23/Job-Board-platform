<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

Route::get('/', function () {
    return view('home.index');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard',DashboardController::class)->name('dashboard');
    Route::get('vacancy/{vacancy}',[VacancyController::class,'show'])->name('vacancy.show');
    Route::get('vacancy/{vacancy}/apply',[VacancyController::class,'apply'])->name('vacancy.apply');
    Route::post('vacancy/{vacancy}/apply',[VacancyController::class,'processToApply'])->name('vacancy.processToApply');
    Route::get('application',[ApplicationController::class,'index'])->name('application.index');
    Route::get('/testAI',[VacancyController::class,'testAi']);




Route::get('/test-cloudinary', function () {
    return view('test-cloudinary');
});

Route::post('/test-cloudinary', function (Request $request) {
    $request->validate([
        'cv_file' => 'required|file|mimes:pdf|max:5120',
    ]);

    $cloudinary = new Cloudinary(
        env('CLOUDINARY_URL')
    );

    $uploadedFile = $cloudinary->uploadApi()->upload(
        $request->file('cv_file')->getRealPath(),
        [
            'resource_type' => 'raw',
            'folder' => 'jobboard/cvs',
        ]
    );

    return response()->json([
        'message' => 'CV uploaded successfully!',
        'public_id' => $uploadedFile['public_id'],
    ]);
});
});

require __DIR__.'/auth.php';
