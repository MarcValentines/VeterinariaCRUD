<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nom,
            'tipo' => $this->tipus,
            'peso' => $this->pes,
            'enfermedad' => $this->enfermetat,
            'comentarios' => $this->comentaris,
            'id_propietario' => $this->id_persona,
        ];
    }
}
