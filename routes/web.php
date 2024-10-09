<?php

use App\Livewire\Alunos;
use App\Livewire\EscolaConfiguracao;
use App\Livewire\Homepage;
use App\Livewire\Modal\ShowEstudantes;
use App\Livewire\Testes\TesteTable;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/home', Homepage::class)->name('home');

    Route::get('/alunos', Alunos::class)->name('alunos');

    Route::get('/alunos/{id}', ShowEstudantes::class);

    Route::get('/escola/configuracao', EscolaConfiguracao::class)->name('escola_configuracao');

    Route::get('/testes', TesteTable::class)->name('testes');

    Route::view('/', 'welcome');
});



Route::view('dashboard', 'homepage')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';


