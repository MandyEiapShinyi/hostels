<?php

use App\Models\Furniture;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\AddressController;
use App\Http\Middleware\checkauth;

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

//admin_panel_login
Route::get('/adminLogin', [AdminController::class, 'adminLogin'])->name('adminLogin');
Route::post('/adminUser', [AdminController::class, 'adminUser']);

//index
Route::get('/admin_show', [StudentController::class, 'adminPanel'])->name('admin.panel')->middleware(checkauth::class);

//add student
Route::get('/addStudent', [StudentController::class, 'showAddForm'])->name('students.add.form');
Route::post('/addStudent', [StudentController::class, 'addStudent'])->name('students.add');

//delete student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

//edit student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/{id}', [StudentController::class, 'update'])->name('students.update');

//add address
Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
Route::post('/addresses', [AddressController::class, 'store'])->name('address.store');

//edit address
Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');

//delete address
Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');

//add room
Route::get('/addRoom', [RoomController::class, 'showAddRoomForm'])->name('rooms.add.form');
Route::post('/rooms/add', [RoomController::class, 'store'])->name('rooms.add');

Route::get('/rooms/manage', [RoomController::class, 'manageRooms'])->name('rooms.manage');
Route::delete('/rooms/{id}', [RoomController::class, 'delete'])->name('rooms.destroy');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::post('/rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update');

//add furniture
Route::get('/addFurniture', [FurnitureController::class, 'showAddFurnitureForm'])->name('furnitures.add.form');
Route::post('/addFurniture', [FurnitureController::class, 'addFurniture'])->name('furnitures.add');

//delete furniture
Route::delete('/furnitures/{id}', [FurnitureController::class, 'delete'])->name('furnitures.destroy');

//edit furniture
Route::get('/furnitures/{id}/edit', [FurnitureController::class, 'edit'])->name('furnitures.edit');
Route::post('/furnitures/{id}', [FurnitureController::class, 'update'])->name('furnitures.update');

//load_room
Route::get('/get-rooms/{addressId}', [StudentController::class, 'getRooms'])->name('getRooms');

Route::get("/countroom/{roomid}",[StudentController::class,'countroom'])->name("countroom");

// logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');


//review
Route::post('/review', [IndexController::class, 'review']);

//room
Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/header', [IndexController::class, 'header']);

Route::get('/about', [IndexController::class, 'about']);

Route::get('/reviewroom', [IndexController::class, 'reviewroom']);

Route::get('/room', [IndexController::class, 'room']);

Route::get('/stores', [IndexController::class,'stores']);