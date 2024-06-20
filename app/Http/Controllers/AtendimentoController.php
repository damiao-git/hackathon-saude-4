<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Atendimento::all();
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'checkin' => 'string',
            
        ]);

        $atendimento = Atendimento::create($request->all());
        return response()->json($atendimento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento)
    {
        return $atendimento;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        $request->validate([
            'paciente_id' => 'required',
            'checkin' => 'string',
            
        ]);
        $atendimento->update($request->all());
        return response()->json($atendimento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();
        return response()->json(null, 204);
    }
}
