<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/sobrenos', function () { return 'Essa é a pagína sobre nós'; });
 
Route ::get('/logincadastro', function () { return 'Essa é a pagína de login e cadastro'; });
Route ::get('/menusalas', function () { return 'Essa é a pagína do menu de salas'; });
Route ::get('/sala', function () { return 'Essa é a pagína da sala'; });
Route ::get('/home', function () { return 'Essa é a pagína home'; });
Route ::get('/contatos', function () { return 'Essa é a pagína sobre os contatos'; });
Route ::get('/contrato', function () { return 'Essa é a pagína para contratar um profissional'; });
Route::get('/login', function(){
    return 'Essa é a página de login'; });