<?php

use Illuminate\Support\Facades\Route;

Route::resource('client', App\Http\Controllers\ClientController::class)->only(['index','store','show','update','destroy']);
