<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // 👈 ADD THIS
use App\Http\Controllers\TodoController;

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos', [TodoController::class, 'store']);
Route::get('/todos/{id}/edit', [TodoController::class, 'edit']);
Route::post('/todos/{id}/update', [TodoController::class, 'update']);
Route::get('/todos/{id}/delete', [TodoController::class, 'destroy']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/test-db', function () {
    return DB::connection()->getPdo();
});