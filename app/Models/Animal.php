<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'tipus',
        'pes',
        'enfermetat',
        'comentaris',
        'id_persona'
    ];

    public function propietari() {
        return $this->belongsTo(Propietari::class, 'id_persona');
    }

}
