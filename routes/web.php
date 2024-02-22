<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Artwork;
use App\Http\Controllers\PhotoViewController;
use App\Http\Controllers\ArtistViewController;
use App\Http\Controllers\OrganiserViewController;
use App\Http\Controllers\ArtworkViewController;
use App\Http\Controllers\PaintingViewController;
use App\Http\Controllers\UserViewController;


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
    // $artworks = Artwork::get();
    $artworks = Artwork::with('artist.user')->get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'artworks' => $artworks,
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
    Route::get('mainPage', [ArtworkViewController::class, 'listArtworks'])->name('mainPage');
    Route::get('/artworks/{id}', [ArtworkViewController::class, 'artworkIndex'])->name('artworkIndex');
    Route::get('/artworks/{id}/edit', [ArtworkViewController::class, 'edit'])->name('artworkEdit');
    Route::get('/userArtworks', [ArtworkViewController::class, 'userArtworks'])->name('userArtworks');
    Route::delete('/artworks/{id}', [ArtworkViewController::class, 'destroy']);
    Route::put('/photos/{photo}', [PhotoViewController::class, 'update']);
    Route::put('/paintings/{painting}', [PaintingViewController::class, 'update']);
    Route::get('/artistsList', [ArtistViewController::class, 'artistList'])->name('artists');
    Route::get('/adminUsers', [UserViewController::class, 'adminIndex'])->name('adminUsers');
});

Route::middleware([
  'auth:sanctum',
    'isAdmin',
])->group(function() {
    Route::get('/adminUsers', [UserViewController::class, 'adminIndex'])->name('adminUsers');
});


Route::resource('artists', ArtistViewController::class);
Route::resource('organisers', OrganiserViewController::class);
Route::resource('artworks', ArtworkViewController::class);
Route::resource('paintings', PaintingViewController::class);
Route::resource('photos', PhotoViewController::class);
Route::resource('prueba', PhotoViewController::class);

