<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $fillable = [
        'id','nom_de_famille', 'prenom_parents', 'nombre_d_enfants', 'email', 'numero_tel'
    ];
}
