<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Support\Facades\Route;

Route::post('/shorten', [ShortenerController::class, 'linkCheck']);
