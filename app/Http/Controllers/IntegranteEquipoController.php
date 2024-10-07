<?php

namespace App\Http\Controllers;

use App\Models\IntegranteEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegranteEquipoController extends Controller
{
    // Listar todos los integrantes de los equipos
    public function index()
    {
        $integrantes = IntegranteEquipo::with(['equipo', 'persona'])->get();
        return response()->json($integrantes);
    }

    // Crear un nuevo integrante de equipo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEquipo' => 'required|exists:equipos,id',
            'idPersona' => 'required|exists:personas,id',
            'rol' => 'required|string|max:255',  // Asumiendo que hay un campo 'rol' o similar
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $integrante = IntegranteEquipo::create($request->all());

        return response()->json($integrante, 201);
    }

    // Mostrar un integrante de equipo específico
    public function show($id)
    {
        $integrante = IntegranteEquipo::with(['equipo', 'persona'])->find($id);

        if (!$integrante) {
            return response()->json(['message' => 'Integrante no encontrado'], 404);
        }

        return response()->json($integrante);
    }

    // Actualizar un integrante de equipo
    public function update(Request $request, $id)
    {
        $integrante = IntegranteEquipo::find($id);

        if (!$integrante) {
            return response()->json(['message' => 'Integrante no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idEquipo' => 'required|exists:equipos,id',
            'idPersona' => 'required|exists:personas,id',
            'rol' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $integrante->update($request->all());

        return response()->json($integrante);
    }

    // Eliminar un integrante de equipo
    public function destroy($id)
    {
        $integrante = IntegranteEquipo::find($id);

        if (!$integrante) {
            return response()->json(['message' => 'Integrante no encontrado'], 404);
        }

        $integrante->delete();

        return response()->json(['message' => 'Integrante eliminado correctamente']);
    }
}
