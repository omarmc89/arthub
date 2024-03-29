<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class OrganiserViewController extends Controller
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
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'confirmPassword' => ['required', 'string', 'same:password'],
        ])->validate();

        $roleId = Role::where('role', 'organiser')->first()->id;

        $user = new User();
        $user->name = $request -> name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $roleId;
        $user->save();

        $userId = User::where('email', '=', $request->email)->first()->id;


        $organiser = new Organiser();
        $organiser->location = $request->location;
        $organiser->enterprise = $request->enterprise;
        $organiser->role_id = $roleId;
        $organiser->user_id = $userId;
        $organiser->save();

        return redirect('/dashboard');
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
