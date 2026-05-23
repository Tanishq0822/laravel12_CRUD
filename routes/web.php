<?php
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// all students showout
Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
// students
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
// student details showout
Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');
//student setails update & edit
Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');

Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
// students details delete
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');

// student resource route
Route::resource('/students', StudentsController::class);
