<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;   // <-- add this
use App\Http\Controllers\Auth\RegisterController;   // <-- add this

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

Route::get('jobs', function () {
    return view('jobs.jobs-listing');
})->name('jobs');

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

Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.store');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'handleLogin'])->middleware('throttle:5,1')->name('login.attempt');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    // profile routes
    Route::get('user/profile', function () {
        return view('user-profile');
    })->name('user.profile');

    Route::get('freelancer/profile', function () {
        return view('freelancer-profile');
    })->name('freelancer.profile');
    Route::get('addproject', function () {
        return view('services.project.post-project');
    })->name('addproject');
    Route::get('addjob', function () {
        return view('jobs.post-jobs');
    })->name('addjob');
});
