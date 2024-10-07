<?php

namespace App\Http\Controllers;

use App\Models\EstadisticaPartido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadisticaPartidoController extends Controller
{
    // Obtener todas las estadísticas de los partidos
    public function index()
    {
        $estadisticas = EstadisticaPartido::with(['partido', 'jugador'])->get();
        return response()->json($estadisticas);
    }

    // Crear una nueva estadística de partido
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idPartido' => 'required|exists:partidos,id',
            'idJugador' => 'required|exists:personas,id',
            'numeroCamiseta' => 'required|integer',
            'tarjetaAmarilla' => 'required|integer|min:0|max:2',
            'puntos' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $estadistica = EstadisticaPartido::create($request->all());

        return response()->json($estadistica, 201);
    }

    // Obtener una estadística de partido por ID
    public function show($id)
    {
        $estadistica = EstadisticaPartido::with(['partido', 'jugador'])->find($id);

        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }

        return response()->json($estadistica);
    }

    // Actualizar una estadística de partido
    public function update(Request $request, $id)
    {
        $estadistica = EstadisticaPartido::find($id);

        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'idPartido' => 'required|exists:partidos,id',
            'idJugador' => 'required|exists:personas,id',
            'numeroCamiseta' => 'required|integer',
            'tarjetaAmarilla' => 'required|integer|min:0|max:2',
            'puntos' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $estadistica->update($request->all());

        return response()->json($estadistica);
    }

    // Eliminar una estadística de partido
    public function destroy($id)
    {
        $estadistica = EstadisticaPartido::find($id);

        if (!$estadistica) {
            return response()->json(['message' => 'Estadística no encontrada'], 404);
        }

        $estadistica->delete();

        return response()->json(['message' => 'Estadística eliminada correctamente']);
    }
}
