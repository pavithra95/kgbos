<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\VerifyController;

Route::get('/', [DocumentController::class, 'home'])->name('/');

Route::get('/document', [DocumentController::class, 'index'])->name('form');
Route::post('/preview', [DocumentController::class, 'preview'])->name('preview');
Route::post('/download-pdf', [DocumentController::class, 'downloadPDF'])->name('download.pdf');


Route::get('/curriculum', [DocumentController::class, 'curriculumIndex'])->name('index');
Route::post('/curriculum/preview', [DocumentController::class, 'curriculumPreview'])->name('curriculumPreview');
Route::post('/curriculum/download-pdf', [DocumentController::class, 'curriculumDownloadPDF'])->name('curriculumdownload.pdf');

Route::get('/theory', [DocumentController::class, 'theoryIndex'])->name('index');
Route::post('/theory/preview', [DocumentController::class, 'theoryPreview'])->name('theoryPreview');
Route::post('/theory/download-pdf', [DocumentController::class, 'theoryDownloadPDF'])->name('theorydownload.pdf');

Route::get('/lab', [DocumentController::class, 'labIndex'])->name('index');
Route::post('/lab/preview', [DocumentController::class, 'labPreview'])->name('labPreview');
Route::post('/lab/download-pdf', [DocumentController::class, 'labDownloadPDF'])->name('labdownload.pdf');


Route::get('/internal', [DocumentController::class, 'internalIndex'])->name('index');
Route::post('/internal/preview', [DocumentController::class, 'internalPreview'])->name('internalPreview');
Route::post('/internal/download-pdf', [DocumentController::class, 'internalDownloadPDF'])->name('internaldownload.pdf');

Route::get('/merge', [DocumentController::class, 'merge'])->name('merge');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('courses', App\Http\Controllers\CourseController::class)->names('courses');
Route::resource('verify', App\Http\Controllers\VerifyController::class)->names('courses');

Route::get('/course-categories', function() {
    return \App\Models\Course::select('id', 'course', 'internal', 'external')
        ->get()
        ->map(function($course) {
            return [
                'id' => $course->id,
                'name' => $course->course,
                'internal_mark' => $course->internal,
                'external_mark' => $course->external
            ];
        });
});


Route::post('/documents/{id}/approve', [DocumentController::class, 'approve'])->name('documents.approve');
Route::post('/documents/{id}/reject', [DocumentController::class, 'reject'])->name('documents.reject');
Route::post('/merge-document', [DocumentController::class, 'mergeDocument'])->name('mergeDocument');


Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');


Route::get('/get-hod-dean/{department_id}', [VerifyController::class, 'getHodDean']);
