<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'nom',
        'tipus',
        'pes',
        'enfermetat',
        'comentaris',
        'id_propietari'
    ];

}
