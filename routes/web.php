<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/{shortUrl}', [ShortenerController::class, 'redirect'])
    ->withoutMiddleware(Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);
