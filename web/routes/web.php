<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
});

Route::get('freelancer-profile', function(){
    return view('freelancer-profile');
});

Route::get('user-profile', function(){
    return view('user-profile');
});

Route::get('forgot', function(){
    return view('forgot');
})->name('forgot');

Route::get('contact-us', function () {
    return view('home.contact-us');     
})->name('contact');

Route::get('support', function () {
    return view('home.support');
})->name('support');

use App\Http\Controllers\JobController;

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

Route::get('job-details', function () {
    return view('jobs.job-details');
})->name('job.details');

Route::get('company', function () {
    return view('services.employers.company-listing');
})->name('company');

Route::get('company-details', function () {
    return view('services.employers.company-details');
})->name('company.details');

Route::get('freelancer', function () {
    return view('services.freelancer.freelancer-listing');
})->name('freelancer');

Route::get('freelancer-details', function () {
    return view('services.freelancer.freelancer-details');
})->name('freelancer.details');

Route::get('project', function () {
    return view('services.project.project-listing');
})->name('project');


Route::get('project-details', function () {
    return view('services.project.project-details');
})->name('project.details');

Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/job-detail/{id}', function ($id) {
    return view('job_detail', ['jobId' => $id]);
})->name('job.detail');

Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'handleLogin'])->middleware('throttle:5,1')->name('login.attempt');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    
    // Profile routes
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    
    // Legacy routes (kept for backward compatibility)
    Route::get('user/profile', [ProfileController::class, 'show'])->name('user.profile');
    Route::get('freelancer/profile', [ProfileController::class, 'show'])->name('freelancer.profile');
    
    // Freelancer dashboard - only for authenticated users with role 'freelancer'
    Route::get('freelancer/dashboard', function () {
        $user = auth()->user();
        if (! $user || $user->role !== 'freelancer') {
            abort(403);
        }
        return view('dashboard.dashboard-freelancer');
    })->name('freelancer.dashboard');
    Route::get('addproject', function () {
        return view('services.project.post-project');
    })->name('addproject');
    Route::get('addjob', [JobController::class, 'create'])->name('addjob');
});
