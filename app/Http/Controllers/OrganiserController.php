<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class OrganiserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Organiser::get();

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

        $selected_role_id = Role::where('role', '=', 'organiser')->first()->id;
        $user->name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> role_id = $selected_role_id;
        $user -> save();

        $organiser = new Organiser();
        $organiser->location = $request->location;
        $organiser->enterprise = $request->enterprise;

        $organiser->role_id = $selected_role_id;
        $organiser->save();

        return response() -> json([
            "meesage" => "Organiser " . $organiser->nickname . " created"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organiser $organiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organiser $organiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organiser $organiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organiser $organiser)
    {
        //
    }
}
