<?php

use App\Http\Controllers\Messagescontroller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');


Route::resource('portfolio', ProjectController::class)
    ->names('projects')
    ->parameters(['portfolio' => 'project']);


Route::get('categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
// Route::get('/portfolio/crear', [ProjectController::class, 'create'])->name('projects.create');
// Route::get('/portfolio/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
// Route::put('/portfolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
// Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');
// Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('projects.show');
// Route::delete('/portfolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::post('contact', [Messagescontroller::class, 'store'])->name('messages.store');

Auth::routes(['register' => false]);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
