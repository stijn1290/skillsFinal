<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('items', ItemsController::class);
