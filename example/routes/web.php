<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

//Jobs Routes (where the magic happens)
Route::resource(
    'jobs',
    JobController::class
    // Com o resource, o Laravel cria todas as rotas automaticamente
    // Sendo elas: index, create, store, show, edit, update, destroy
    //, ['except' => ['show']] --Para quando quero que alguma rota nao seja criada
    //, ['only' => ['index', 'show']] --Para quando quero que apenas algumas rotas sejam criadas
);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);