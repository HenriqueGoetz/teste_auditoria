<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function () {
    return view('empresa');
})->name('empresa');

Route::get('/empresas/', [EmpresaController::class, 'index'])->name('empresas.index');

Route::get('/empresas/{id}', [EmpresaController::class, 'show'])
    ->whereNumber('id')->name('empresas.show');
