<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userValidate = $request->validate([
            'curp'=>'required|min:18|unique:users'
        ]);
        $user = User::create($userValidate);
        return response()->json($user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $citas =$user->citas;
        return response()->json(['user'=>$user,'citas'=>$citas],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        return response()->json(['message'=>'Usuario eliminado correctamente'],200);
    }
}
