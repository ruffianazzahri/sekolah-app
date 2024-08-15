<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('home');
});
Route::controller(AuthController::class)->group(function () {

    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});



//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', function () {
        $userName = Auth::user()->name;
        return redirect()->route('home')->with('userName', $userName);
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', function () {
        $userName = Auth::user()->name;
        return redirect()->route('admin.home')->with('userName', $userName);
    });

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');

    // Route::get('/admin/products', [ProductController::class, 'index'])->name('admin/products');
    // Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin/products/create');
    // Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin/products/store');
    // Route::get('/admin/products/show/{id}', [ProductController::class, 'show'])->name('admin/products/show');
    // Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/products/edit');
    // Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/products/update');
    // Route::delete('/admin/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin/products/destroy');
});