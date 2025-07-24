<?php


use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Middleware\EnsureUserIsJobSeeker;
use App\Http\Middleware\EnsureUserIsCompany;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// For job seekers: My Applications
Route::get('/my-applications', [JobController::class, 'myApplications'])
    ->middleware(['auth', 'job_seeker'])
    ->name('my.applications');

// For companies: My Jobs
Route::get('/my-jobs', [JobController::class, 'myJobs'])
    ->middleware(['auth', 'company'])
    ->name('my.jobs');

require __DIR__.'/auth.php';
