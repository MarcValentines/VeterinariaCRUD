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
        //validación basica
        if(!$request->nom || !$request->tipus || !$request->pes || !$request->id_persona){
            return response()->json(['error' => 'faltan datos obligatorios']);
        }

        $animal = Animal::create([
            'nom' => $request->nom,
            'tipus' => $request->tipus,
            'pes' => $request->pes,
            'enfermetat' => $request->enfermetat,
            'comentaris' => $request->comentaris,
            'id_persona' => $request->id_persona
        ]);

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

        $animal->nom = $request->nom ?? $animal->nom;
        $animal->tipus = $request->tipus ?? $animal->tipus;
        $animal->pes = $request->pes ?? $animal->pes;
        $animal->enfermetat = $request->enfermetat ?? $animal->enfermetat;
        $animal->comentaris = $request->comentaris ?? $animal->comentaris;
        $animal->id_persona = $request->id_persona ?? $animal->id_persona;

        $animal::save();

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
