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
            'nom' => $this->nom,
            'tipus' => $this->tipus,
            'pes' => $this->pes,
            'enfermetat' => $this->enfermetat,
            'comentaris' => $this->comentaris,
            'id_persona' => $this->id_persona,
        ];
    }
}
