<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Tasks;
use App\Http\Controllers\RouteController;
use App\Http\Livewire\Viewtasks;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/tasks', function () {
//     return view('tasks');
// })->middleware(['auth'])->name('tasks');
// Route::get('/users', function () {
//     return view('users');
// })->middleware(['auth'])->name('users');
// Route::get('/steps', function () {
//     return view('steps');
// })->middleware(['auth'])->name('steps');
// Route::get('/view-task', function () {
//     return view('tasks.show');
// })->middleware(['auth'])->name('tasks');


// Route::get('/view-task/{id}', [RouteController::class, 'ViewTask'])->middleware(['auth']);
Route::get('/view-task/', function(){
    return view('show_task');
})->middleware(['auth']);


Route::get('/steps',[RouteController::class,'steps']);
Route::get('/users',[RouteController::class,'users']);
Route::get('/tasks',[RouteController::class,'tasks']);



require __DIR__.'/auth.php';
