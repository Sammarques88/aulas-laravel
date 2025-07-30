<?php
 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContatosController;
use App\Models\Contatos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

//Rota de contato
route::get('/contatos', [ContatosController::class, 'index'])->name('contatos.index');

//rota delete
Route::delete('/contatos/{contatoId}', [ContatosController::class, 'delete'])->name('contatos.delete');
 
//rota create get (mostra a view de criação)
Route::get('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create.get');

//rota create post (adiciona o contato)
Route::post('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create.post');


//Rota de Update - método get
Route::get('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.get');

//Rota de Update - método put
 Route::put('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.put');

//Rota de contato usuários
route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

 //rota delete usuários
Route::delete('/usuarios/{userId}', [UsuariosController::class, 'delete'])->name('usuarios.delete');
 
//rota create usuários get (mostra a view de criação)
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create.get');

//rota create usuários post (adiciona o contato)
Route::post('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create.post');


//Rota de Update usuários- método get
Route::get('/usuarios/update/{userID}', [UsuariosController::class, 'update'])->name('usuarios.update.get');

//Rota de Update usuários- método put
 Route::put('/usuarios/update/{userID}', [usuariosController::class, 'update'])->name('usuarios.update.put');
 
 Route::get('/', function () {
    return view('welcome');
});
 
 
route::get('/index', function () {
    return view('index');
    })->middleware(['auth', 'verified'])->name('index');


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 

 




 require __DIR__.'/auth.php';