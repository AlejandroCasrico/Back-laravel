<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::all();
        return response()->json($citas,200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user = User::create([
            'curp' => $request->curp
        ]);

        $cita = Cita::create([
            'curp' => $request->curp
        ]);

        $cita->user()->associate($user);
        $cita->save();

        return response()->json($cita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        $user = $cita->user;
        return response()->json(['cita' => $cita, 'user'=> $user],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $cita->update($request->all());
        return response()->json($cita,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return response()->json(['message'=>'Cita eliminada correctamente'],200);
    }
}