<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipoController extends Controller
{
    // Obtener todos los equipos
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json($equipos);
    }

    // Crear un equipo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            // Agrega otros campos que tenga tu modelo
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $equipo = Equipo::create($request->all());

        return response()->json($equipo, 201);
    }

    // Obtener un equipo por ID
    public function show($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        return response()->json($equipo);
    }

    // Actualizar un equipo
    public function update(Request $request, $id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            // Agrega otros campos que tenga tu modelo
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $equipo->update($request->all());

        return response()->json($equipo);
    }

    // Eliminar un equipo
    public function destroy($id)
    {
        $equipo = Equipo::find($id);

        if (!$equipo) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        $equipo->delete();

        return response()->json(['message' => 'Equipo eliminado correctamente']);
    }
}
