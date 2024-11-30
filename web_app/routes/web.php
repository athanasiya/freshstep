<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/get-started', function () {
        return view('pages.get-started');
    })->name('get-started');

    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('/leaderboard', function () {
        return view('pages.leaderboard');
    })->name('leaderboard');

    Route::get('/profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::get('/preferences', function () {
        return view('pages.preferences');
    })->name('preferences');

    Route::get('/optimized-route', function () {
        return view('pages.optimized-route');
    })->name('optimized-route');
});

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
        return view('pages.auth.register');
    })->name('register');

    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/route', function (Request $request) {
    $pythonApiUrl = env('PYTHON_API_URL'); // Flask API
    $response = Http::post($pythonApiUrl, $request->all());
    if ($response->failed()) {
        return response()->json(['error' => 'Failed to connect to Flask API'], 500);
    }
    return response()->json($response->json(), $response->status());
});
