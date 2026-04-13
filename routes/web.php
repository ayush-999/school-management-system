<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\HealthController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeesAmountController;
use App\Http\Controllers\Backend\Setup\FeesCategoryController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\SubjectController;

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

        // Student Year Management Routes
        Route::get('/student/year/view', [StudentYearController::class, 'ViewStudentYear'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'AddStudentYear'])->name('student.year.add');
        Route::post('/student/year/store', [StudentYearController::class, 'StoreStudentYear'])->name('student.year.store');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('student.year.edit');
        Route::post('/student/year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('student.year.update');
        Route::get('/student/year/delete/{id}', [StudentYearController::class, 'DeleteStudentYear'])->name('student.year.delete');

        // Student Group Management Routes
        Route::get('/student/group/view', [StudentGroupController::class, 'ViewStudentGroup'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'AddStudentGroup'])->name('student.group.add');
        Route::post('/student/group/store', [StudentGroupController::class, 'StoreStudentGroup'])->name('student.group.store');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'EditStudentGroup'])->name('student.group.edit');
        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('student.group.update');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'DeleteStudentGroup'])->name('student.group.delete');

        // Student Shift Management Routes
        Route::get('/student/shift/view', [StudentShiftController::class, 'ViewStudentShift'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'AddStudentShift'])->name('student.shift.add');
        Route::post('/student/shift/store', [StudentShiftController::class, 'StoreStudentShift'])->name('student.shift.store');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'EditStudentShift'])->name('student.shift.edit');
        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('student.shift.update');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'DeleteStudentShift'])->name('student.shift.delete');


        // Fees Category Management Routes
        Route::get('/fees/category/view', [FeesCategoryController::class, 'ViewFeesCategory'])->name('fees.category.view');
        Route::get('/fees/category/add', [FeesCategoryController::class, 'AddFeesCategory'])->name('fees.category.add');
        Route::post('/fees/category/store', [FeesCategoryController::class, 'StoreFeesCategory'])->name('fees.category.store');
        Route::get('/fees/category/edit/{id}', [FeesCategoryController::class, 'EditFeesCategory'])->name('fees.category.edit');
        Route::post('/fees/category/update/{id}', [FeesCategoryController::class, 'UpdateFeesCategory'])->name('fees.category.update');
        Route::get('/fees/category/delete/{id}', [FeesCategoryController::class, 'DeleteFeesCategory'])->name('fees.category.delete');

        // Fees Category Amount Management Routes
        Route::get('/fees/amount/view', [FeesAmountController::class, 'ViewFeesAmount'])->name('fees.amount.view');
        Route::get('/fees/amount/add', [FeesAmountController::class, 'AddFeesAmount'])->name('fees.amount.add');
        Route::post('/fees/amount/store', [FeesAmountController::class, 'StoreFeesAmount'])->name('fees.amount.store');
        Route::get('/fees/amount/edit/{fees_category_id}', [FeesAmountController::class, 'EditFeesAmount'])->name('fees.amount.edit');
        Route::post('/fees/amount/update/{fees_category_id}', [FeesAmountController::class, 'UpdateFeesAmount'])->name('fees.amount.update');
        Route::get('/fees/amount/details/{fees_category_id}', [FeesAmountController::class, 'DetailsFeesAmount'])->name('fees.amount.details');

        // Exam Type Management Routes
        Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
        Route::post('/exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('exam.type.store');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
        Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('exam.type.update');
        Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');

        // Subject Management Routes
        Route::get('/subject/view', [SubjectController::class, 'ViewSubject'])->name('subject.view');
        Route::get('/subject/add', [SubjectController::class, 'AddSubject'])->name('subject.add');
        Route::post('/subject/store', [SubjectController::class, 'StoreSubject'])->name('subject.store');
        Route::get('/subject/edit/{id}', [SubjectController::class, 'EditSubject'])->name('subject.edit');
        Route::post('/subject/update/{id}', [SubjectController::class, 'UpdateSubject'])->name('subject.update');
        Route::get('/subject/delete/{id}', [SubjectController::class, 'DeleteSubject'])->name('subject.delete');

        // Assign Subject Management Routes
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
        Route::post('/assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('assign.subject.store');
        Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
        Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('assign.subject.update');
        Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
        
    });

    // Health Check Routes
    Route::get('/health', [HealthController::class, 'index'])->name('health.index');
}); 

// End Middleare Auth Route 