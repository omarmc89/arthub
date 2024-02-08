<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Artwork;
use App\Models\User;
use App\Models\Role;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

use Debugbar;


class PhotoViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $test = User::find(1)->artist()->first();
        Debugbar::info($test);
        return Inertia::render('Artworks/Prueba');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $userId = Auth::user()->id;
      $artistId = User::find($userId)->artist()->first()->id;

      $artwork = new Artwork();
      $artwork->title = $request->title;
      $artwork->description = $request->description;
      $artwork->image_url = $request->image_url;
      $artwork->artist_id = $artistId;
      $artwork->save();

      $photo = new Photo();
      $photo->style = $request->style;
      $photo->artwork_id = Artwork::where('artist_id','=',$artistId)->where('title', $request->title)->first()->id;
      $photo->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
