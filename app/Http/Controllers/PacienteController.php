<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return Paciente::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'sexo' => 'required|string|max:1',
            'sintomas' => 'required|string',
            'pressaoArterial' => 'string',
            'temperatura' => 'string',
            'glicemia'=> 'string',
            'saturacao' => 'string',
            'batimentosCardiacos' => 'string',
            'email'=> 'email',
            'tipoPessoa' => 'string',
        ]);

        $paciente = Paciente::create($request->all());
        return response()->json($paciente, 201);
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
    
        if (!$paciente) {
            return response()->json([
                'message' => 'Paciente não encontrado.'
            ], 404);
        }
    
        return response()->json($paciente, 200);
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'idade' => 'sometimes|required|integer',
            'sexo' => 'sometimes|required|string|max:1',
            'sintomas' => 'sometimes|required|string',
            'pressaoArterial' => 'string',
            'temperatura' => 'string',
            'glicemia'=> 'string',
            'saturacao' => 'string',
            'batimentosCardiacos' => 'string',
            'email'=> 'email',
            'tipoPessoa' => 'string',
        ]);

        $paciente->update($request->all());
        return response()->json($paciente, 200);
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json(null, 204);
    }

    
}
