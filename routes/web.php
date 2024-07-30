<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ParentsController;
use App\Http\Controllers\Admin\EntranceController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;

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
            Route::post('/create',[ClassesController::class,'create'])->name('create');
        });

        Route::prefix('section/')->name('section.')->group(function () {
            Route::get('/',[SectionController::class,'section'])->name('manage');
            Route::post('/create',[SectionController::class,'create'])->name('create');
        });

        Route::prefix('subject/')->name('subject.')->group(function () {
            Route::get('/',[SubjectController::class,'subject'])->name('manage');
            Route::post('/create',[SubjectController::class,'create'])->name('create');
        });

        Route::get('parents',[ParentsController::class,'index'])->name('parents');

        Route::prefix('student/')->name('student.')->group(function () {
            Route::get('create',[StudentController::class,'create'])->name('create');
        });
        
        Route::prefix('entrance/')->name('entrance.')->group(function () {
            Route::get('question-create',[EntranceController::class,'question_create'])->name('question.create');
        });
        
        Route::prefix('admission/')->name('admission.')->group(function () {
            
        });
    });
});

