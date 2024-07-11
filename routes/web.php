<?php

use App\Http\Controllers\AdmissionApplicationController;
use App\Http\Controllers\CourseApplicationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\ProfessionalOrganisationController;
use App\Http\Controllers\ProfessionalQualificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/application', [AdmissionApplicationController::class, 'index'])->name('application.index');
    Route::get('/preview', [AdmissionApplicationController::class, 'preview'])->name('application.preview');
    Route::get('/submit-application', [AdmissionApplicationController::class, 'submitApplication'])->name('application.submit');
    Route::get('/pay-application', [AdmissionApplicationController::class, 'store'])->name('application.store');
    // Route::get('/confirm-application-payment', [AdmissionApplicationController::class, 'confirmAppPayment'])->name('application.confirm-app-payment');

    Route::get('/course-application/create', [CourseApplicationController::class, 'create'])->name('course-application.create');
    Route::post('/course-application/store', [CourseApplicationController::class, 'store'])->name('course-application.store');
    Route::get('/course-application/edit/{courseApplication}', [CourseApplicationController::class, 'edit'])->name('course-application.edit');
    Route::patch('/course-application/update/{courseApplication}', [CourseApplicationController::class, 'update'])->name('course-application.update');

    Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
    Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');
    Route::get('/education/edit/{education}', [EducationController::class, 'edit'])->name('education.edit');
    Route::patch('/education/update/{education}', [EducationController::class, 'update'])->name('education.update');

    Route::get('/personal-detail/create', [PersonalDetailController::class, 'create'])->name('personal-detail.create');
    Route::post('/personal-detail/store', [PersonalDetailController::class, 'store'])->name('personal-detail.store');
    Route::get('/personal-detail/edit/{personalDetail}', [PersonalDetailController::class, 'edit'])->name('personal-detail.edit');
    Route::patch('/personal-detail/update/{personalDetail}', [PersonalDetailController::class, 'update'])->name('personal-detail.update');

    Route::get('/professional-qualification/create', [ProfessionalQualificationController::class, 'create'])->name('professional-qualification.create');
    Route::post('/professional-qualification/store', [ProfessionalQualificationController::class, 'store'])->name('professional-qualification.store');
    Route::get('/professional-qualification/edit/{professionalQualification}', [ProfessionalQualificationController::class, 'edit'])->name('professional-qualification.edit');
    Route::patch('/professional-qualification/update/{professionalQualification}', [ProfessionalQualificationController::class, 'update'])->name('professional-qualification.update');

    Route::get('/professional-organisation/create', [ProfessionalOrganisationController::class, 'create'])->name('professional-organisation.create');
    Route::post('/professional-organisation/store', [ProfessionalOrganisationController::class, 'store'])->name('professional-organisation.store');
    Route::get('/professional-organisation/edit/{professionalOrganisation}', [ProfessionalOrganisationController::class, 'edit'])->name('professional-organisation.edit');
    Route::patch('/professional-organisation/update/{professionalOrganisation}', [ProfessionalOrganisationController::class, 'update'])->name('professional-organisation.update');





    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
