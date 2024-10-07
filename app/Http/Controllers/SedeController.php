<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function index()
    {
        // Muestra una lista de todas las sedes
        $sedes = Sede::all();
        return response()->json($sedes);
    }

    public function show($id)
    {
        // Muestra una sede específica
        $sede = Sede::findOrFail($id);
        return response()->json($sede);
    }

    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombreSede' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        // Crear la sede
        $sede = Sede::create($validated);

        return response()->json($sede, 201);
    }

    public function update(Request $request, $id)
    {
        // Validación
        $validated = $request->validate([
            'nombreSede' => 'sometimes|string|max:255',
            'ubicacion' => 'sometimes|string|max:255',
        ]);

        // Actualizar la sede
        $sede = Sede::findOrFail($id);
        $sede->update($validated);

        return response()->json($sede);
    }

    public function destroy($id)
    {
        // Eliminar una sede
        $sede = Sede::findOrFail($id);
        $sede->delete();

        return response()->json(['message' => 'Sede eliminada']);
    }
}
