<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/user.php';
Route::get('/check-session', function () {
    return session()->all();
});