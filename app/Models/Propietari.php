<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietari extends Model
{
    protected $fillable = [
        'nom',
        'cognom'
    ];
}
