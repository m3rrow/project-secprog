<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\FreelancerAccountController;
use App\Http\Controllers\User\CustomerAccountController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\EnsureRole;

/* untuk registrasi */
Route::post('/register', [RegisterController::class, 'register']);

/* untuk login */
Route::middleware(['web','guest:web','throttle:5,1'])
    ->post('/login', [LoginController::class, 'login'])
    ->withoutMiddleware(VerifyCsrfToken::class); // disable csrf

/* untuk logout */
Route::middleware(['web','auth:web'])
    ->get('/logout', [LogoutController::class, 'logout'])
    ->withoutMiddleware(VerifyCsrfToken::class); // disable csrf

/* untuk ganti password */
Route::middleware(['web','auth:web'])
    ->post('/change_password', [ChangePasswordController::class, 'changePassword'])
    ->withoutMiddleware(VerifyCsrfToken::class); // disable csrf


/* start of freelancer area */
// {{url}}/api/freelancer-account/view
// untuk melihat informasi detail freelancer
Route::middleware(['web','auth:web',
    EnsureRole::class.':freelancer'])
    ->get('/freelancer-account/view', [FreelancerAccountController::class, 'view']);

// {{url}}/api/freelancer-account/insert
// untuk memasukkan informasi detail freelancer untuk pertama kalinya dan wajib
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->post('/freelancer-account/insert', [FreelancerAccountController::class, 'insert'])
    ->withoutMiddleware(VerifyCsrfToken::class);

// {{url}}/api/freelancer-account/update
// setelah insert digunakan, update berfungsi untuk melakukan update informasi detail freelancer
// hanya bisa digunakan jika user sudah melakukan /insert
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->post('/freelancer-account/update', [FreelancerAccountController::class, 'update'])
    ->withoutMiddleware(VerifyCsrfToken::class);
/* end of freelancer area */


/* start of customer area */
// {{url}}/api/customer-account/view
// untuk melihat informasi detail customer
Route::middleware(['web','auth:web',
    EnsureRole::class.':customer'])
    ->get('/customer-account/view', [CustomerAccountController::class, 'view']);

// {{url}}/api/customer-account/insert
// untuk memasukkan informasi detail customer untuk pertama kalinya dan wajib
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':customer'])
    ->post('/customer-account/insert', [CustomerAccountController::class, 'insert'])
    ->withoutMiddleware(VerifyCsrfToken::class);

// {{url}}/api/customer-account/update
// setelah insert digunakan, update berfungsi untuk melakukan update informasi detail customer
// hanya bisa digunakan jika user sudah melakukan /insert
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':customer'])
    ->post('/customer-account/update', [CustomerAccountController::class, 'update'])
    ->withoutMiddleware(VerifyCsrfToken::class);
/* end of customer area */


/* redirect semua request /api/* ke / */
Route::get('{any}', function () {
    return redirect('/');
})->where('any', '.*')->name('api.catchall.get');