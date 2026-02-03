<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PropietariController;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Propietari;
use App\Http\Resources\AnimalResource;

class AnimalController extends Controller
{

    //listar todos los animales
    public function index() {
        return AnimalResource::collection(Animal::all());
    }

    //añadir nuevo animal
    public function store(Request $request){

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'tipus' => 'required|in:gos,gat,conill,rata',
            'pes' => 'required|numeric',
            'enfermetat' => 'nullable|string|max:255',
            'comentaris' => 'nullable|string',
            'id_persona' => 'required|integer|exists:propietaris,id'
        ]);

        $animal = new Animal();
        $animal->nom = $validated['nom'];
        $animal->tipus = $validated['tipus'];
        $animal->pes = $validated['pes'];
        $animal->enfermetat = $validated['enfermetat'] ?? null;
        $animal->comentaris = $validated['comentaris'] ?? null;
        $animal->id_persona = $validated['id_persona'];
        
        $animal->save();
        return new AnimalResource($animal);
    }

    //mostrar anumal per id
    public function show($id) {
        $animal = Animal::find($id);

        if(!$animal) {
            return response()->json(['ERROR' => 'No se ha encontrado el animal']);
        }

        return new AnimalResource($animal);
    }

    //actualizar un animal
    public function update(Request $request, $id){
        $animal = Animal::find($id);

        if(!$animal) {
            return response()->json(['ERROR' => 'No se ha encontrado el animal']);
        }

        //validaciones básicas
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'tipus' => 'sometimes|required|in:gos,gat,conill,rata',
            'pes' => 'sometimes|required|numeric',
            'enfermetat' => 'nullable|string|max:255',
            'comentaris' => 'nullable|string',
            'id_persona' => 'sometimes|required|integer|exists:propietaris,id'
        ]);

        $animal->update([
            'nom' => $validated['nom'] ?? $animal->nom,
            'tipus' => $validated['tipus'] ?? $animal->tipus,
            'pes' => $validated['pes'] ?? $animal->pes,
            'enfermetat' => $validated['enfermetat'] ?? $animal->enfermetat,
            'comentaris' => $validated['comentaris'] ?? $animal->comentaris,
            'id_persona' => $validated['id_persona'] ?? $animal->id_persona
        ]);
        return new AnimalResource($animal);

    }

    //eliminar animal
    public function destroy($id){
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }

        $animal->delete();
        return response()->json(['mensaje' => 'Animal eliminado']);
    }
}
