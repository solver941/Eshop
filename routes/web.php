<?php

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [\App\Http\Controllers\WelcomeController::class, "home"]);
Route::get("/back_home", [\App\Http\Controllers\WelcomeController::class, "check_admin"])->name("check");
Route::get("/home_page", [\App\Http\Controllers\HomeController::class, "logout"])->name("logout");

Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"]);
Route::get("/payment", [\App\Http\Controllers\TaskController::class, "payment"])->name("payment");

Route::middleware(["auth"])->group(function () {
    Route::resource("/admin", \App\Http\Controllers\AdminController::class);
});

Route::group(['prefix' => 'product'], function () {
    Route::get("/{id}/show", [\App\Http\Controllers\ProductController::class, "showProduct"]);
});

Route::prefix('admin')->middleware('isAdmin')->group(function() {
    Route::get("/{id}/delete", [\App\Http\Controllers\ProductController::class, "deleteProduct"])->name("product_delete");
    Route::get("/{id}/edit", [\App\Http\Controllers\ProductController::class, "editProduct"])->name("product_edit{id}");
    Route::patch("/{id}/update", [\App\Http\Controllers\ProductController::class, "updateProduct"])->name("product_update");
    Route::post("/store", [\App\Http\Controllers\ProductController::class, "storeProduct"])->name("product_store");

});


Route::get('/email/verify', function () {
    return view('auth/verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');




Route::middleware(["auth"])->group(function () {
    Route::resource("/admin", \App\Http\Controllers\AdminController::class);
});
Auth::routes();







