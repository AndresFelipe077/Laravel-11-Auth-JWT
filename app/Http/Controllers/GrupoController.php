<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupoController extends Controller
{
    // Obtener todos los grupos
    public function index()
    {
        $grupos = Grupo::with('torneo')->get();
        return response()->json($grupos);
    }

    // Crear un nuevo grupo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idTorneo' => 'required|exists:torneos,id',
            'nombreGrupo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $grupo = Grupo::create($request->all());

        return response()->json($grupo, 201);
    }

    // Obtener un grupo por su ID
    public function show($id)
    {
        $grupo = Grupo::with('torneo')->find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        return response()->json($grupo);
    }

    // Actualizar un grupo
    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idTorneo' => 'required|exists:torneos,id',
            'nombreGrupo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $grupo->update($request->all());

        return response()->json($grupo);
    }

    // Eliminar un grupo
    public function destroy($id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo no encontrado'], 404);
        }

        $grupo->delete();

        return response()->json(['message' => 'Grupo eliminado correctamente']);
    }
}
