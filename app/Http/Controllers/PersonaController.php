<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Get all people
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $people = Persona::all();
        return response()->json($people);
    }

    /**
     * Create new person
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $persona = Persona::create($request->all());
        return response()->json($persona, 201);
    }

    /**
     * Get person by id
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $person = Persona::findOrFail($id);
        return response()->json($person);
    }

    /**
     * Update person by id
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $person = Persona::findOrFail($id);
        $person->update($request->all());
        return response()->json($person);
    }

    /**
     * Delete person by id
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $person = Persona::findOrFail($id);
        return response()->json(null, 204);
    }
}
