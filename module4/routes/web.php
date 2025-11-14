<?php

use App\Http\Controllers\CropController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/crop',[CropController::class, "crop"])->name('crop');
