<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

use Debugbar;


class ArtistViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function artistList()
    {
        $artists = Artist::with('user')->get();
        return Inertia::render('Artists', [
            'artists' => $artists,
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
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'confirmPassword' => ['required', 'string', 'same:password'],
        ])->validate();

        $roleId = Role::where('role','artist')->first()->id;

        $user = new User();
        $user->name = $request -> name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $roleId;
        $user->avatar = $request->avatar;
        $user->save();

        $userId = User::where('email', '=', $request->email)->first()->id;

        $artist = new Artist();
        $artist->nickname = $request->nickname;
        $artist->role_id = $roleId;
        $artist->user_id = $userId;
        $artist->save();

        return redirect('/dashboard');
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
