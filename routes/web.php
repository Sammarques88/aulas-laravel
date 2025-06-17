<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

//Rota de contato
Route::get('/contatos', [ContactsController::class, 'index']) ->name('contatos.index');
//Rota Delete
Route::delete('contatos/{contatoId}', [ContactsController::class, 'delete']) ->name('contatos.delete');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index'); 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get ('/contatos', [ContactsController::class, 'index']) ->name('contatos.index');


require __DIR__.'/auth.php';
