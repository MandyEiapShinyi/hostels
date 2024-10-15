 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

//register form
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/adduser', [UserController::class, 'adduser']);

//login form
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/user', [UserController::class, 'user']);

//index
Route::get('/index', [IndexController::class, 'index']);

//review
Route::post('/review', [IndexController::class, 'review']);

//room
Route::get('/contect', [IndexController::class, 'contect']);

//logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');