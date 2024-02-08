<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Artist::get();

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
        $userExists = User::where('email', '=', $request->email)->first();
        if ($userExists) {
            return (response()->json([
                "message" => "User already exists"
            ], 400));
        }
        $user = new User();

        $selected_role_id = Role::where('role', '=', 'artist')->first()->id;
        $user->name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> role_id = $selected_role_id;
        $user -> save();

        $artist = new Artist();
        $artist->nickname = $request->nickname;

        $selected_role_id = Role::where('role', '=', 'artist')->first()->id;
        $artist->role_id = $selected_role_id;
        $artist->save();

        return response() -> json([
            "meesage" => "Artist " . $artist->nickname . " created"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
