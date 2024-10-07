<?php

namespace App\Http\Controllers;

use App\Models\Escenario;
use Illuminate\Http\Request;

class EscenarioController extends Controller
{
    public function index()
    {
        // Muestra una lista de todos los escenarios
        $escenarios = Escenario::with('sede')->get();
        return response()->json($escenarios);
    }

    public function show($id)
    {
        // Muestra un escenario específico
        $escenario = Escenario::with('sede')->findOrFail($id);
        return response()->json($escenario);
    }

    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombreEscenario' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'idSede' => 'required|uuid|exists:sedes,id',
        ]);

        // Crear el escenario
        $escenario = Escenario::create($validated);

        return response()->json($escenario, 201);
    }

    public function update(Request $request, $id)
    {
        // Validación
        $validated = $request->validate([
            'nombreEscenario' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'idSede' => 'sometimes|uuid|exists:sedes,id',
        ]);

        // Actualizar el escenario
        $escenario = Escenario::findOrFail($id);
        $escenario->update($validated);

        return response()->json($escenario);
    }

    public function destroy($id)
    {
        // Eliminar un escenario
        $escenario = Escenario::findOrFail($id);
        $escenario->delete();

        return response()->json(['message' => 'Escenario eliminado']);
    }
}
