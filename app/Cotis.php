<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotis extends Model
{
    protected $fillable = [
        'nombre_enfants', 'benevolat', 'mois', 'type_de_cotisation', 'type_de_paiement', 'montant'
    ];
}
