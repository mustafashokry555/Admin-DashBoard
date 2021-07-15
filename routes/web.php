<?php

use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\DrugController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PharmController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

//First Bage Route
Route::redirect('/', '/dashboard');
Route::redirect('/home', '/dashboard');

//logout Route
Route::get('/logoutt', function () {
    return view('auth.logoutt');
});

//Admin folder Routes
Route::prefix('dashboard')->group(function () {
    //Home page
    Route::get('', [HomeController::class, 'home'])->middleware(['auth', 'admin']);
    //Admins  page
    Route::get('/admins', [UserController::class, 'showAdmins'])->middleware(['auth', 'admin']);
    //users page
    Route::get('/users', [UserController::class, 'showUsers'])->middleware(['auth', 'admin']);
    //drugs page
    Route::get('/drugs', [DrugController::class, 'showDrugs'])->middleware(['auth', 'admin']);
    //categores  page
    Route::get('/categores', [CatController::class, 'showCats'])->middleware(['auth', 'admin']);
    //Pharmacies  page
    Route::get('/pharms', [PharmController::class, 'showpharms'])->middleware(['auth', 'admin']);

    //show drug with id
    Route::get('/drug/{id}',[DrugController::class, 'showDrug'])->middleware(['auth', 'admin']);
    //show user with id
    Route::get('/profile', function () {return view('admin.profile');})->middleware(['auth', 'admin']);
    //show user with id
    Route::get('/userInfo/{id}',[UserController::class, 'userInfo'])->middleware(['auth', 'admin']);

    //Edit Drug
    Route::get('/drugs/edit/{id}',[DrugController::class, 'edit'])->middleware(['auth', 'admin']);
    //Handel Edit Drug
    Route::get('/drugs/handelEdit/{id}',[DrugController::class, 'handelEdit'])->middleware(['auth', 'admin']);
    //Edit User
    Route::get('/profile/Edit/{id}',[UserController::class, 'edit'])->middleware(['auth', 'admin']);
    //Handel Edit Drug
    Route::get('/profile/handelEdit/{id}',[UserController::class, 'handelEdit'])->middleware(['auth', 'admin']);

    //add new Drug
    Route::get('/drugs/addDrug', [DrugController::class, 'addDrug'])->middleware(['auth', 'admin']);
    //Handel New Drug
    Route::get('/drugs/storeDrug',[DrugController::class, 'storeDrug'])->middleware(['auth', 'admin']);
    //add new Admin
    Route::get('/admins/addAdmin', function () {return view('admin.addAdmin');})->middleware(['auth', 'superadmin']);
    //Handel New Admin
    Route::post('/admins/storeAdmin',[UserController::class, 'storeAdmin'])->middleware(['auth', 'superadmin']);

    //Delete Drug
    Route::get('/drugs/delete/{id}',[DrugController::class, 'delete'])->middleware(['auth', 'admin']);
    //Delete User
    Route::get('/user/delete/{id}',[UserController::class, 'delete'])->middleware(['auth', 'admin']);
    //Delete Pharm
    Route::get('/pharm/delete/{id}',[PharmController::class, 'delete'])->middleware(['auth', 'admin']);

});
//add new Admin
Route::get('/choseD', function () {return view('choseD');});
