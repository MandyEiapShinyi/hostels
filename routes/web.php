 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/adduser', [UserController::class, 'adduser']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/user', [UserController::class, 'user']);

Route::get('/index', [   IndexController::class, 'index']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/adminlogin', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin panel route
Route::get('/admin/panel', [LoginController::class, 'adminindex']);