<?php

use App\Http\Controllers\Controller;
use App\Livewire\StudentLists;
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

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('testing', [Controller::class, 'testing'])->name('testing');
Route::get('add-new-student', [Controller::class, 'addNewStudent'])->name('addNewStudent');
Route::get('edit-student/{i}', [Controller::class, 'editStudent'])->name('editStudent');
Route::get('student-class', [Controller::class, 'studentClasses'])->name('studentClasses');
Route::get('random-form-submissions', [Controller::class, 'randomFormSubmission'])->name('randomFormSubmission');
Route::get('random-form', [Controller::class, 'randomForm'])->name('randomForm');
Route::get('pagination', [Controller::class, 'pagination'])->name('pagination');
Route::get('attendence', [Controller::class, 'attendence'])->name('attendence');
Route::get('attendence2', [Controller::class, 'attendence2'])->name('attendence2');
Route::get('download-files', [Controller::class, 'downloadFiles'])->name('downloadFiles');
Route::get('posts', [Controller::class, 'posts'])->name('posts');
