<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AnimalController;
use App\Http\Resources\PropietariResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Propietari;

class PropietariController extends Controller
{
    //llistar tots els propietaris
    public function index() {
        return PropietariResource::collection(Propietari::all());
    }

    //crear un nou propietari
    public function store(Request $request) {
        
        if (!$request->nom || !$request->cognom) {
            return response()->json(['error' => 'Faltan datos obligatorios']);
        }
        
        $propietari = Propietari::create([
            'nom' => $request->nom,
            'cognom' => $request->cognom
        ]);

        return new PropietariResource($propietari);
    }

    //mostrar un propietari per id
    public function show($id){
        $propietari = Propietari::find($id);

        if(!$propietari) {
            return response()->json(['ERROR' => `No s'ha trobat el propietari`]);
        }

        return new PropietariResource($propietari);
    }

    //Actualitzar propietari

    public function update(Request $request, $id) {
        $propietari = Propietari::find($id);

        if(!$propietari) {
            return response()->json(['ERROR' => `No s'ha trobat el propietari`]);
        }

        //actuialitzar camps
        $propietari->nom = $request->nom ?? $propietari->nom;
        $propietari->cognom = $request->cognom ?? $propietari->cognom;

        $propietari->save();

        return new PropietariResource($propietari);
    }

    public function destroy($id) {
        $propietari = Propietari::find($id);

        if(!$propietari) {
            return response()->json(['ERROR' => `No s'ha trobat el propietari`]);
        }

        $propietari->delete();
        return response()->json('Usuario eliminado');

    }
}
