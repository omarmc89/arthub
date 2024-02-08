<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PhotoViewController;
use App\Http\Controllers\ArtistViewController;
use App\Http\Controllers\OrganiserViewController;
use App\Http\Controllers\ArtworkViewController;
use App\Http\Controllers\PaintingViewController;
use App\Models\Artwork;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $artworks = Artwork::get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'artworks' => $artworks
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource('artists', ArtistViewController::class);
Route::resource('organisers', OrganiserViewController::class);
Route::resource('artworks', ArtworkViewController::class);
Route::resource('paintings', PaintingViewController::class);
Route::resource('photos', PhotoViewController::class);
Route::resource('prueba', PhotoViewController::class);

