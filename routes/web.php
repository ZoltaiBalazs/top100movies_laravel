<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/movies');
Route::resource('movies',MovieController::class);
