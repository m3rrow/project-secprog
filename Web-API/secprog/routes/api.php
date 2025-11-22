<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\User\FreelancerAccountController;
use App\Http\Controllers\User\CustomerAccountController;

use App\Http\Controllers\Job\JobsController;
use App\Http\Controllers\Job\JobOrderController;

use App\Http\Controllers\Admin\AdminWalletController;

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



/* start of job area */
// {{url}}/api/jobs
// {{url}}/api/jobs?limit=3&sort=asc
// {{url}}/api/jobs?status=available&category=Web%20Application%20Pentest&limit=10&offset=10
Route::get('/jobs', [JobsController::class, 'index']);

// {{url}}/api/jobs/mine
// {{url}}/api/jobs/mine?status=available&category=Web%20Application%20Pentest&limit=10&offset=10
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->get('/jobs/mine', [JobsController::class, 'mine'])
    ->withoutMiddleware(VerifyCsrfToken::class);

// {{url}}/api/jobs/{id}
Route::middleware(['web','auth:web'])
    ->get('/jobs/{id}', [JobsController::class, 'show']);

// {{url}}/api/jobs/insert_job
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->post('/jobs/create', [JobsController::class, 'create'])
    ->withoutMiddleware(VerifyCsrfToken::class);

// {{url}}/jobs/{id}/update_job
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->post('/jobs/{id}/update', [JobsController::class, 'update'])
    ->withoutMiddleware(VerifyCsrfToken::class);

// {{url}}/jobs/{id}/delete
Route::middleware(['web','auth:web','throttle:30,1',
    EnsureRole::class.':freelancer'])
    ->get('/jobs/{id}/delete', [JobsController::class, 'delete'])
    ->withoutMiddleware(VerifyCsrfToken::class);
/* end of job area */


/* 
###########################
###### CHECKOUT AREA ######
###########################
*/
    // ========== CUSTOMER SIDE ==========
    Route::middleware(['web','auth:web',
        EnsureRole::class.':customer'])
        ->post('/jobs/{job_id}/checkout', [JobOrderController::class, 'checkout'])
        ->withoutMiddleware(VerifyCsrfToken::class);

    Route::middleware(['web','auth:web',
        EnsureRole::class.':customer'])
        ->get('/orders/mine', [JobOrderController::class, 'customerOrders']);

    Route::middleware(['web','auth:web',
        EnsureRole::class.':customer'])
        ->get('/orders/{order_id}/complete', [JobOrderController::class, 'complete']);

    Route::middleware(['web','auth:web',
        EnsureRole::class.':customer'])
        ->post('/orders/{order_id}/review', [JobOrderController::class, 'review'])
        ->withoutMiddleware(VerifyCsrfToken::class);

    // ========== FREELANCER SIDE ==========
    Route::middleware(['web','auth:web',
        EnsureRole::class.':freelancer'])
        ->get('/orders/incoming', [JobOrderController::class, 'freelancerOrders']);

    Route::middleware(['web','auth:web',
        EnsureRole::class.':freelancer'])
        ->get('/orders/{order_id}/accept', [JobOrderController::class, 'freelancerAccept']);

    Route::middleware(['web','auth:web',
        EnsureRole::class.':freelancer'])
        ->get('/orders/{order_id}/reject', [JobOrderController::class, 'freelancerReject']);

    // ========== SHARED ==========
    Route::middleware(['web','auth:web'])
        ->get('/orders/{order_id}', [JobOrderController::class, 'show']);



// ========== ADMIN PANEL ==========
Route::middleware(['web','auth:web',
    EnsureRole::class.':admin'])
    ->post('/admin/wallet/topup/{user_id}', [AdminWalletController::class, 'topup'])
    ->withoutMiddleware(VerifyCsrfToken::class);

Route::middleware(['web','auth:web',
    EnsureRole::class.':admin'])
    ->get('/admin/orders/{order_id}/approve-payment', [AdminWalletController::class, 'approveJobPayment']);

Route::middleware(['web','auth:web',
    EnsureRole::class.':admin'])
    ->get('/admin/orders/{order_id}/refund-payment', [AdminWalletController::class, 'refundJobPayment']);


/* redirect semua request /api/* ke / */
Route::get('{any}', function () {
    return redirect('/');
})->where('any', '.*')->name('api.catchall.get');