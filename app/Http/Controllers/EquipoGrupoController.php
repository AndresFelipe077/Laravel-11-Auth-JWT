<?php

namespace App\Http\Controllers;

use App\Models\EquipoGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipoGrupoController extends Controller
{
    // Obtener todos los equipos en grupos
    public function index()
    {
        $equipoGrupos = EquipoGrupo::with(['equipo', 'grupo'])->get();
        return response()->json($equipoGrupos);
    }

    // Crear un equipo en grupo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEquipo' => 'required|exists:equipos,id',
            'idGrupo' => 'required|exists:grupos,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $equipoGrupo = EquipoGrupo::create($request->all());

        return response()->json($equipoGrupo, 201);
    }

    // Obtener un equipo en grupo por ID
    public function show($id)
    {
        $equipoGrupo = EquipoGrupo::with(['equipo', 'grupo'])->find($id);

        if (!$equipoGrupo) {
            return response()->json(['message' => 'Equipo en grupo no encontrado'], 404);
        }

        return response()->json($equipoGrupo);
    }

    // Actualizar un equipo en grupo
    public function update(Request $request, $id)
    {
        $equipoGrupo = EquipoGrupo::find($id);

        if (!$equipoGrupo) {
            return response()->json(['message' => 'Equipo en grupo no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idEquipo' => 'required|exists:equipos,id',
            'idGrupo' => 'required|exists:grupos,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $equipoGrupo->update($request->all());

        return response()->json($equipoGrupo);
    }

    // Eliminar un equipo en grupo
    public function destroy($id)
    {
        $equipoGrupo = EquipoGrupo::find($id);

        if (!$equipoGrupo) {
            return response()->json(['message' => 'Equipo en grupo no encontrado'], 404);
        }

        $equipoGrupo->delete();

        return response()->json(['message' => 'Equipo en grupo eliminado correctamente']);
    }
}

