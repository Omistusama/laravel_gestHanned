<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cantine extends Model
{
    protected $fillable = [
        'type', 'id_eleve', 'mois', 'status'
    ];
}
