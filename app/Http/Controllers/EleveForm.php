<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eleve;
use App\Famille;
use App\Cantine;
use App\Classe;
use DB;

class EleveForm extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $eleves = DB::table('eleve')->join('familles', 'familles.id', '=', 'eleve.id_parent')
        ->join('classes', 'classes.idClasse', '=', 'eleve.id_classe')
        ->select('familles.nom_de_famille', 'classes.*', 'eleve.*' )
        
        ->get();
        $classe = DB::table('classes')->join('eleve', 'classes.idClasse', '=', 'eleve.id_classe')
        ->select('classes.nom_de_classe', 'classes.*', 'eleve.*' )
        ->get();
        $cantine = DB::table('eleve')
            ->where('type_cotisation', '=', 'Cantine')
            ->count('id');
        $panier = DB::table('eleve')
            ->where('type_cotisation', '=', 'Panier')
            ->count('id');
        $externe = DB::table('eleve')
            ->where('type_cotisation', '=', 'Externe')
            ->count('id');
        $etude = DB::table('eleve')
            ->where('type_cotisation', '=', 'Etude')
            ->count('id');
        $pasetude = DB::table('eleve')
            ->where('type_cotisation', '=', 'Pas etude')
            ->count('id');
        return view('bilaneleve',compact('eleves', 'cantine', 'panier', 'externe', 'etude', 'pasetude', 'classe'));
    }

    public function create(){
        $eleves = DB::table('eleve') ->get();
        $famille = DB::table('familles') ->get();
        $classe = DB::table('classes')->get();
        return view('formeleve',compact('famille', 'eleves', 'classe'));
    }

    public function store(Request $request){
        $data = array();
        $data['id_parent'] = $request-> id_parent;
        $data['prenom_eleve'] = $request-> prenom_eleve;
        $data['id_classe'] = $request -> id_classe;
        $data['type_cotisation'] = $request-> type_cotisation;
        $eleves = DB::table('eleve')->insert($data);
        $lastinsert = DB::getPdo()->lastInsertId();
        $cotisation = DB::table('lacantine')->insert([
            ['mois' => 'Janvier', 'id_eleve' => $lastinsert],
            ['mois' => 'Fevrier',  'id_eleve' => $lastinsert],
            ['mois' => 'Mars', 'id_eleve' => $lastinsert],
            ['mois' => 'Avril', 'id_eleve' => $lastinsert],
            ['mois' => 'Mai', 'id_eleve' => $lastinsert],
            ['mois' => 'Juin', 'id_eleve' => $lastinsert],
            ['mois' => 'Septembre', 'id_eleve' => $lastinsert],
            ['mois' => 'Octobre', 'id_eleve' => $lastinsert],
            ['mois' => 'Novembre', 'id_eleve' => $lastinsert],
            ['mois' => 'Decembre', 'id_eleve' => $lastinsert]
        ]);
        $enfants = DB::table('familles')->join('eleve', 'eleve.id_parent', '=', 'familles.id')
        ->increment('nombre_d_enfants');
        return redirect()->route('bilaneleve')
                        -> with('success', 'Élève créé avec succès ! ');
    }

    public function edit($id){
        $famille = DB::table('familles') ->get();
        $eleves = DB::table('familles')->join('eleve', 'familles.id', '=', 'eleve.id_parent')
        ->select('familles.nom_de_famille', 'eleve.*' )
        ->where('eleve.id',$id)->first();
        $classe = DB::table('classes')->join('eleve', 'classes.idClasse', '=', 'eleve.id_classe')
        ->select('classes.nom_de_classe', 'eleve.*' )
        ->where('eleve.id',$id)->first();       
        return view('modifele', compact('famille','eleves', 'classe'));
    }

    public function update(Request $request, $id){
        $data = array();
        $data['id_parent'] = $request-> id_parent;
        $data['prenom_eleve'] = $request-> prenom_eleve;
        $data['id_classe'] = $request -> id_classe;
        $data['type_cotisation'] = $request-> type_cotisation;

        $eleves = DB::table('eleve')->where('id', $id)-> update($data);
        return redirect()->route('bilaneleve')
                        -> with('success', 'Élève modifié avec succès ! ');
    }
    
    public function delete(Request $request, $id){
        $eleves = DB::table('eleve')->where('id', $id)-> delete();
        
        return redirect()->route('bilaneleve')
                        -> with('success', 'Élève supprimé avec succès ! ');
    }
}
 