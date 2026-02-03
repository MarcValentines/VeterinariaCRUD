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
        
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'cognom' => 'required|string|max:255',
        ]);

        $propietari = new Propietari();
        $propietari->nom = $validated['nom'];
        $propietari->cognom = $validated['cognom'];
        $propietari->save();

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
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'cognom' => 'required|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            $propietari->$key = $value;
        }

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
