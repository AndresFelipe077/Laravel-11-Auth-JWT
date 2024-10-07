<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisciplinaController extends Controller
{
    // Obtener todas las disciplinas
    public function index()
    {
        $disciplinas = Disciplina::all();
        return response()->json($disciplinas);
    }

    // Crear una nueva disciplina
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreDisciplina' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $disciplina = Disciplina::create([
            'nombreDisciplina' => $request->nombreDisciplina,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($disciplina, 201);
    }

    // Mostrar una disciplina específica
    public function show($id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['message' => 'Disciplina no encontrada'], 404);
        }

        return response()->json($disciplina);
    }

    // Actualizar una disciplina
    public function update(Request $request, $id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['message' => 'Disciplina no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombreDisciplina' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $disciplina->update($request->all());

        return response()->json($disciplina);
    }

    // Eliminar una disciplina
    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json(['message' => 'Disciplina no encontrada'], 404);
        }

        $disciplina->delete();

        return response()->json(['message' => 'Disciplina eliminada correctamente']);
    }
}
