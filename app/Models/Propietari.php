<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietari extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'cognom'
    ];

    public function animals() {
        return $this->hasMany(Animal::class, 'id_persona');
    }
}
