<?php

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
/*Route::group(['middleware' => ['auth']], function () {
    Route::get("/", [\App\Http\Controllers\WelcomeController::class, "home"]);
});*/

/*Auth::routes(["verify" => true]);*/
Route::get("/", [\App\Http\Controllers\WelcomeController::class, "home"]);
Route::get("/back_home", [\App\Http\Controllers\WelcomeController::class, "check_admin"])->name("check");
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified']);*/
/*Route::get('/home', function () {
    return view('auth/verify');
})->middleware(['verified']);;

Route::get('/home', function () {
    return view('auth/verify');
});*/
Route::get("/home_page", [\App\Http\Controllers\HomeController::class, "logout"])->name("logout");
Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"]);
/*Route::get('/admin', function () {
    return view('admin');
});*/
Route::post("/product/store", [\App\Http\Controllers\ProductController::class, "storeProduct"]);
Route::get("/product/{id}/delete", [\App\Http\Controllers\ProductController::class, "deleteProduct"]);
Route::get("/product/{id}/edit", [\App\Http\Controllers\ProductController::class, "editProduct"]);
Route::patch("/product/{id}/update", [\App\Http\Controllers\ProductController::class, "updateProduct"]);
Route::get("/add_cart/{id}", [\App\Http\Controllers\TaskController::class, "add_cart"])->name("add_cart");
Route::get("/shopping_cart", [\App\Http\Controllers\TaskController::class, "shopping_cart"]);


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


Route::get('/profile', function () {
})->middleware(['auth', 'verified']);

Route::middleware(["auth"])->group(function () {
    Route::resource("/admin", \App\Http\Controllers\AdminController::class);
});
Auth::routes();
Route::get("/product/{id}/show", [\App\Http\Controllers\ProductController::class, "showProduct"]);
/*Route::get('/', function () {
    return view('welcome');
});
Auth::routes(["verify" => true]);/*
*/
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/


/*Route::get("/", [App\Http\Controllers\HomeController::class, 'admin']);*/
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name("home");*/
/*Route::prefix("admin")->middleware("auth", "isAdmin")->group(function() {
        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name("admin");
});*/


/*Route::get("/register", function() {
    return view("register");
})->middleware(["auth", "verified"])->name("register");*/



