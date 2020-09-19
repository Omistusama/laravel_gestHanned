<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Famille;
use DB;

class CantineForm extends Controller
{
    public function index()
    {
        $data = array();
        $cotisation = DB::table('cotiseleve')->insert([
            ['mois' => 'Janvier', 'id_eleve' => id_eleve],
            ['mois' => 'Fevrier',  'id_eleve' => id_eleve],
            ['mois' => 'Mars', 'id_eleve' => id_eleve],
            ['mois' => 'Avril', 'id_eleve' => id_eleve],
            ['mois' => 'Mai', 'id_eleve' => id_eleve],
            ['mois' => 'Juin', 'id_eleve' => id_eleve],
            ['mois' => 'Septembre', 'id_eleve' => id_eleve],
            ['mois' => 'Octobre', 'id_eleve' => id_eleve],
            ['mois' => 'Novembre', 'id_eleve' => id_eleve],
            ['mois' => 'Decembre', 'id_eleve' => id_eleve]
        ]);
        return redirect()->route('bilaneleve');
    }
}
