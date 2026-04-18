<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::redirect('/', '/todos');

Route::resource('todos', TodoController::class)->except(['show']);

Route::get('/check-db', function () {
    return [
        'host' => config('database.connections.mysql.host'),
        'db' => config('database.connections.mysql.database'),
    ];
});