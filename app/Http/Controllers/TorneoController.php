<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function index()
    {
        // Muestra una lista de todos los torneos
        $torneos = Torneo::all();
        return response()->json($torneos);
    }

    public function show($id)
    {
        // Muestra un torneo específico
        $torneo = Torneo::findOrFail($id);
        return response()->json($torneo);
    }

    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInicio',
            // Agrega más campos según tus necesidades
        ]);

        // Crear el torneo
        $torneo = Torneo::create($validated);

        return response()->json($torneo, 201);
    }

    public function update(Request $request, $id)
    {
        // Validación
        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'fechaInicio' => 'sometimes|date',
            'fechaFin' => 'sometimes|date|after:fechaInicio',
            // Agrega más campos según tus necesidades
        ]);

        // Actualizar el torneo
        $torneo = Torneo::findOrFail($id);
        $torneo->update($validated);

        return response()->json($torneo);
    }

    public function destroy($id)
    {
        // Eliminar un torneo
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();

        return response()->json(['message' => 'Torneo eliminado']);
    }
}
