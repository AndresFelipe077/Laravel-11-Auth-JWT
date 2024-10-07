<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartidoController extends Controller
{
    // Listar todos los partidos
    public function index()
    {
        $partidos = Partido::with(['equipoA', 'equipoB', 'equipoGanador', 'escenario', 'arbitro1', 'arbitro2', 'arbitro3'])->get();
        return response()->json($partidos);
    }

    // Crear un nuevo partido
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEquipoA' => 'required|exists:equipos,id',
            'idEquipoB' => 'required|exists:equipos,id',
            'idEquipoGanador' => 'nullable|exists:equipos,id',
            'fechaPartido' => 'required|date',
            'horaInicial' => 'required|date_format:H:i',
            'horaFinal' => 'nullable|date_format:H:i',
            'estado' => 'required|string',
            'idArbitro1' => 'nullable|exists:personas,id',
            'idArbitro2' => 'nullable|exists:personas,id',
            'idArbitro3' => 'nullable|exists:personas,id',
            'idEscenario' => 'required|exists:escenarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $partido = Partido::create($request->all());

        return response()->json($partido, 201);
    }

    // Mostrar un partido específico
    public function show($id)
    {
        $partido = Partido::with(['equipoA', 'equipoB', 'equipoGanador', 'escenario', 'arbitro1', 'arbitro2', 'arbitro3'])->find($id);

        if (!$partido) {
            return response()->json(['message' => 'Partido no encontrado'], 404);
        }

        return response()->json($partido);
    }

    // Actualizar un partido
    public function update(Request $request, $id)
    {
        $partido = Partido::find($id);

        if (!$partido) {
            return response()->json(['message' => 'Partido no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idEquipoA' => 'required|exists:equipos,id',
            'idEquipoB' => 'required|exists:equipos,id',
            'idEquipoGanador' => 'nullable|exists:equipos,id',
            'fechaPartido' => 'required|date',
            'horaInicial' => 'required|date_format:H:i',
            'horaFinal' => 'nullable|date_format:H:i',
            'estado' => 'required|string',
            'idArbitro1' => 'nullable|exists:personas,id',
            'idArbitro2' => 'nullable|exists:personas,id',
            'idArbitro3' => 'nullable|exists:personas,id',
            'idEscenario' => 'required|exists:escenarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $partido->update($request->all());

        return response()->json($partido);
    }

    // Eliminar un partido
    public function destroy($id)
    {
        $partido = Partido::find($id);

        if (!$partido) {
            return response()->json(['message' => 'Partido no encontrado'], 404);
        }

        $partido->delete();

        return response()->json(['message' => 'Partido eliminado correctamente']);
    }
}
