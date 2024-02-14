<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArtworkViewController extends Controller
{


    public function listArtworks()
    {
      $artworks = Artwork::with('artist.user')->get();
        return $artworks;
    }

    public function artworkIndex ($id) {
      $artwork = Artwork::with('artist.user')->findOrFail($id);
      return Inertia::render('ArtworkIndex', [
        'artwork' => $artwork,
      ]);
    }

    public function index (Request $request) {
      // $artworks = QueryBuilder::for (Artwork::class)
      // ->allowedFilters(['title', 'artist.user.name'])
      // ->allowedSorts('title', 'artist.user.name')
      // ->paginate($request->get('perPage', 4));
      // return response()->json($artworks);
    }

    public function userArtworks (Request $request) {
      $user = $request->user()->name;
    //   $userArtworks = Artwork::with('artist.user')->whereHas('artist.user', function ($query) use ($user) {
    //     $query->where('name', '=', $user);
    // })->get();
    // $userArtworks = DB::table('artworks')
    // ->select('artworks.*') 
    // ->join('artists', 'artworks.artist_id', '=', 'artists.id')
    // ->join('users', 'artists.user_id', '=', 'users.id') 
    // ->where('users.name', 'like', '%' . $user . '%')
    // ->get();
      
      $userArtworks = Artwork::select('artworks.*')
    ->join('artists', 'artworks.artist_id', '=', 'artists.id')
    ->join('users', 'artists.user_id', '=', 'users.id')
    ->where('users.name', 'like', '%' . $user . '%')
    ->get();
    return Inertia::render('UserArtworks', [
      'userArtworks' => $userArtworks,
    ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $artwork = Artwork::with('artist.user', 'photo', 'painting')->findOrFail($id);
        // if (Auth::user()->name == $artwork->artist->user->name){
        //   return Inertia::render('ArtworkEdit',['artwork' => $artwork]);
        // } else {
        //   return Inertia::render('Errors/403')->toResponse(request())->setStatusCode(403);
        // }

        return Inertia::render('ArtworkEdit',['artwork' => $artwork]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $artwork = Artwork::findOrFail($id);
        $artwork->delete();
        return redirect()->back()->with('success','Artwork deleted');
    }
}
