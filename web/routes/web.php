<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $allJobs = \App\Models\Job::where('is_active', true)->latest()->get();
    $featuredJobs = $allJobs->take(8);
    $remoteJobs = $allJobs->where('location', 'Remote')->take(8);
    $partTimeJobs = $allJobs->where('job_type', 'part-time')->take(8);
    
    return view('index', [
        'allJobs' => $allJobs,
        'featuredJobs' => $featuredJobs,
        'remoteJobs' => $remoteJobs,
        'partTimeJobs' => $partTimeJobs,
    ]);
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

// Public job viewing routes
Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/{id}/checkout', [JobController::class, 'checkout'])->name('jobs.checkout');

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
    
    // Protected job management routes - only for authenticated freelancers
    Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('jobs', [JobController::class, 'store'])->middleware('throttle:10,1')->name('jobs.store');
    Route::get('jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::post('jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::post('jobs/{id}/delete', [JobController::class, 'destroy'])->name('jobs.destroy');
    
    // Freelancer dashboard - only for authenticated users with role 'freelancer'
    Route::get('freelancer/dashboard', function () {
        $user = auth()->user();
        if (! $user || $user->role !== 'freelancer') {
            abort(403);
        }
        
        // Get user's services
        $jobs = \App\Models\Job::where('user_id', $user->id)->get();
        $activeCount = $jobs->where('is_active', true)->count();
        $totalEarnings = '$0.00'; // Placeholder for now
        
        return view('dashboard.dashboard-freelancer', [
            'jobs' => $jobs,
            'activeCount' => $activeCount,
            'totalEarnings' => $totalEarnings,
        ]);
    })->name('freelancer.dashboard');
    Route::get('addproject', function () {
        return view('services.project.post-project');
    })->name('addproject');
    Route::get('addjob', [JobController::class, 'create'])->name('addjob');
});
