<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
     'prenom_eleve', 'classe_eleve'
    ];
}
