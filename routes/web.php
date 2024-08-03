<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ParentsController;
use App\Http\Controllers\Admin\EntranceController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\PaymentController;

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

Route::prefix('admin/')->name('admin.')->group(function () {
    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('auth',[LoginController::class,'login_auth'])->name('auth');

    Route::middleware('auth:admin')->group( function () {
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('logout');

        Route::prefix('class/')->name('class.')->group(function () {
            Route::get('/',[ClassesController::class,'classes'])->name('manage');
            Route::post('create',[ClassesController::class,'create'])->name('create');
        });

        Route::prefix('section/')->name('section.')->group(function () {
            Route::get('/',[SectionController::class,'section'])->name('manage');
            Route::post('create',[SectionController::class,'create'])->name('create');
        });

        Route::prefix('subject/')->name('subject.')->group(function () {
            Route::get('/',[SubjectController::class,'subject'])->name('manage');
            Route::post('create',[SubjectController::class,'create'])->name('create');
        });

        Route::prefix('teacher/')->name('teacher.')->group(function () {
            Route::get('create',[TeacherController::class,'index'])->name('create');
            Route::post('save',[TeacherController::class,'save'])->name('save');
        });

        Route::prefix('parents/')->name('parents.')->group(function () {
            Route::get('/',[ParentsController::class,'index'])->name('manage');
            Route::post('create',[ParentsController::class,'create'])->name('create');
        });

        // Route::prefix('student/')->name('student.')->group(function () {
        //     Route::get('create',[StudentController::class,'create'])->name('create');
        //     Route::post('store',[StudentController::class,'store'])->name('store');
        // });

        Route::prefix('admission/')->name('admission.')->group(function () {
            Route::get('registration',[AdmissionController::class,'registration'])->name('registration');
            Route::post('store',[AdmissionController::class,'store'])->name('store');
            Route::get('list',[AdmissionController::class,'list'])->name('list');
        });

        Route::prefix('academic/')->name('academic.')->group(function () {
            Route::get('class-setup',[AcademicController::class,'class_setup'])->name('class_setup');
            Route::post('store-class-setup',[AcademicController::class,'store_class_setup'])->name('store_class_setup');

            Route::get('fee-setup',[AcademicController::class,'fee_setup'])->name('fee_setup');
            Route::post('store-fee-setup',[AcademicController::class,'store_fee_setup'])->name('store_fee_setup');
        });
        
        Route::prefix('entrance/')->name('entrance.')->group(function () {
            Route::get('question-create',[EntranceController::class,'question_create'])->name('question.create');
        });
        
        Route::prefix('payment/')->name('payment.')->group(function () {
            Route::get('admission/{id}',[PaymentController::class,'admission_payment'])->name('admission');
        });
    });
});

