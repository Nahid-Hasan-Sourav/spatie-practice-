<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    // dd(Auth::user()->roles);
    //editor acess will be only role
    Route::group(['middleware' => ['role:admin|editor']], function () {
      
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/all-roles',[RoleController::class,'index'])->name('all.roles');
        Route::get('/add-role',[RoleController::class,'rolesView'])->name('roles-view');
        Route::post('/store-role',[RoleController::class,'store'])->name('role-store');
        Route::get('/edit-role/{id}',[RoleController::class,'editRole'])->name('role-edit');
        Route::post('/update-role/{id}',[RoleController::class,'updateRole'])->name('role-update');
        Route::post('/delete-role/{id}',[RoleController::class,'deleteRole'])->name('role-delete');

    });
   //admin accesss
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/all-users',[UserController::class,'index'])->name('all.users');
        Route::get('/add-user',[UserController::class,'userView'])->name('user-view');
        Route::post('/store-user',[UserController::class,'store'])->name('user-store');
        Route::get('/edit-user/{id}',[UserController::class,'editUser'])->name('edit-user');
        Route::post('/update-user/{id}',[UserController::class,'updateUser'])->name('update-user');
        Route::post('/delete-user/{id}',[UserController::class,'deleteUser'])->name('delete-user');
    });
});
