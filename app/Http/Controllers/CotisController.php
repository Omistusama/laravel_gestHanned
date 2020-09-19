<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotis;
use App\Famille;
use App\Classe;
use App\Eleve;
use DB;

class CotisController extends Controller
{
    public function index()
    {
        $lesfamilles = DB::table('familles')->count('id');

        $tp = array();
        $tp[] =  210;
        $tp[] =  195;
        $tp[] =  175;

        $tc = array();
        $tc[] =  220;
        $tc[] =  210;
        $tc[] =  200;
        $x = 0;
        $y = 0;
        $couttotal = array();
      
        $classec = DB::table('eleve')->join('lescotisations', 'lescotisations.id_parents', '=', 'eleve.id_parent')
        ->select('eleve.*' )
        ->where('eleve.id_classe', '>', '5')
        ->count();

        $classep = DB::table('eleve')->join('lescotisations', 'lescotisations.id_parents', '=', 'eleve.id_parent')
        ->select('eleve.*' )
        ->where('eleve.id_classe', '<', '6')
        ->count();
        
        $n = DB::table('familles')->join('eleve', 'familles.id', '=', 'eleve.id_parent')->select('familles.nombre_d_enfants')->first()->nombre_d_enfants;
        
        $nbenfant = (int)$n;
        for($i = 0; $i<$lesfamilles; $i++)
        {
            
           
                if($nbenfant > 0 && $nbenfant < 3)
                {    
                    $x = $classep;
                    $y = $classec;
                    $couttotal[] = $x * $tp[$nbenfant-1] + $y * $tc[$nbenfant-1];
                }
                if($nbenfant >= 3)
                {
                    $x = $classep;
                    $y = $classec;
                    $couttotal[] = $x * $tp[2] + $y * $tc[2];
                }
            
            
            
            $x = 0;
            $y = 0;
        }
        
        
        
        
        
        $datamois = array();
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Septembre')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Octobre')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Novembre')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Decembre')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Janvier')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Fevrier')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Mars')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Avril')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Mai')
        ->sum('montant');
        $datamois[] = DB::table('lescotisations')
        ->where('mois', '=', 'Juin')
        ->sum('montant');
    
        $datamoiscantine = array();
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Septembre')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Octobre')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Novembre')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Decembre')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Janvier')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Fevrier')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Mars')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Avril')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Mai')
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        $datamoiscantine[] = DB::table('lescotisations')
        ->where('mois', '=', 'Juin', )
        ->where('type_de_cotisation', '=', 'cantine')
        ->sum('montant');
        
        $cotisation = DB::table('familles')->join('lescotisations', 'familles.id', '=', 'lescotisations.id_parents')
        ->select('familles.*', 'lescotisations.*' )
        ->get();
        return view('bilancotis',compact('cotisation', 'datamois', 'datamoiscantine', 'tc', 'tp', 'n', 'couttotal' ,'classep', 'classec', 'x', 'y'));
    }

    public function create(){
        $cotisation = DB::table('lescotisations') ->get();
        $famille = DB::table('familles') ->get();
        $souche = DB::table('souche') ->get();
        $test = DB::table('familles') ->select('familles.nombre_d_enfants') -> first() ->nombre_d_enfants;

        return view('formcotis',compact('famille', 'cotisation', 'souche'));
    }

    public function store(Request $request){
        $data = array();
        $data['id_parents'] = $request-> id_parents;
        $data['benevolat'] = $request-> benevolat;
        $data['mois'] = $request-> mois;
        $data['type_de_cotisation'] = $request-> type_de_cotisation;
        $data['type_de_paiement'] = $request-> type_de_paiement;
        $data['montant'] = $request-> montant;
        $data['idSouche'] = $request-> idSouche;
        $cotisation = DB::table('lescotisations')->insert($data);
        return redirect()->route('bilancotis')
                        -> with('success', 'Cotisation créé avec succès ! ');
    }

    public function edit($id){
        $famille = DB::table('familles') ->get();
        $souche = DB::table('souche') ->get();
        $cotisation = DB::table('lescotisations')->join('familles', 'familles.id', '=', 'lescotisations.id_parents')
        ->select('familles.nom_de_famille', 'lescotisations.*' )
        ->where('lescotisations.id',$id)->first()
;
        return view('modifcotis', compact('famille','cotisation', 'souche'));
    }

    public function update(Request $request, $id){
        $data = array();
        $data['benevolat'] = $request-> benevolat;
        $data['mois'] = $request-> mois;
        $data['type_de_paiement'] = $request-> type_de_paiement;
        $data['montant'] = $request-> montant;
        $data['idSouche'] = $request-> idSouche;
        $cotisation = DB::table('lescotisations')->where('id', $id)-> update($data);
        return redirect()->route('bilancotis')
                        -> with('success', 'Cotisation modifiée avec succès ! ');
    }
    
    public function delete(Request $request, $id){
        $cotisation = DB::table('lescotisations')->where('id', $id)-> delete();
        return redirect()->route('bilancotis')
                        -> with('success', 'Cotisation supprimée avec succès ! ');
    }
}
 