<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $fillable = [
        'idCheque','souche', 'montant', 'id_parent'
    ];
}
