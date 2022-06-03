<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Mail;

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
Route::get('/view-task/', function () {
    return view('show_task');
})->middleware(['auth']);

require __DIR__ . '/auth.php';
Route::get('/steps', [RouteController::class, 'steps'])->middleware(['auth']);
Route::get('/users', [RouteController::class, 'users'])->middleware(['auth']);
Route::get('/tasks', [RouteController::class, 'tasks'])->middleware(['auth']);
Route::get('/alltasks', [RouteController::class, 'alltasks'])->middleware(['auth']);
Route::get('/allsteps', [RouteController::class, 'allsteps'])->middleware(['auth']);
Route::get('/profile', [RouteController::class, 'profile'])->middleware(['auth']);
Route::get('/test', function () {
    event(new App\Events\StatusLiked('status-liked'));
    return "Event has been sent!";
});
Route::post('/profile/update', 'App\Http\Livewire\Profile@update');





