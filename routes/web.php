<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\HealthController;

Route::get('/', function () {
    return view(view: 'auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {

    // User Management All Routes
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('users.view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
    });

    // Permission Management Routes - Only for admin and super_admin
    Route::middleware(['role:super_admin|admin'])->prefix('permissions')->group(function () {
        Route::get('/manage', [PermissionController::class, 'ManagePermissions'])->name('permissions.manage');
        Route::post('/update', [PermissionController::class, 'UpdateUserPermissions'])->name('permissions.update');
        Route::post('/assign', [PermissionController::class, 'AssignPermission'])->name('permissions.assign');
        Route::post('/revoke', [PermissionController::class, 'AssignPermission'])->name('permissions.revoke-permission');
        Route::get('/user/{id}', [PermissionController::class, 'GetUserPermissions'])->name('permissions.get-user');
    });

    //User Profile and Change Password
    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit/{id}', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        Route::post('/store/{id}', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });

    // Setup Management All Routes
    Route::prefix('setups')->group(function () {
        Route::get('/student/class/view', [StudentClassController::class, 'ViewStudentClass'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'AddStudentClass'])->name('student.class.add');
        Route::post('/student/class/store', [StudentClassController::class, 'StoreStudentClass'])->name('student.class.store');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('student.class.edit');
        Route::post('/student/class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('student.class.update');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'DeleteStudentClass'])->name('student.class.delete');

    });

    // Health Check Routes
    Route::get('/health', [HealthController::class, 'index'])->name('health.index');

}); 

// End Middleare Auth Route 