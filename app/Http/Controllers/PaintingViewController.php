<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Artwork;
use App\Models\User;
use App\Models\Role;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;

class PaintingViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

      $painting = new Painting();
      $painting->style = $request->style;
      $painting->width = $request->width;
      $painting->height = $request->height;

      $painting->artwork_id = Artwork::where('artist_id','=',$artistId)->where('title', $request->title)->first()->id;
      $painting->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(Painting $painting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Painting $painting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Painting $painting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Painting $painting)
    {
        //
    }
}
