<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
// creo la ruta de tipo recurso con la url = task con el controlador TaskController
Route::resource('tasks', TaskController::class);
