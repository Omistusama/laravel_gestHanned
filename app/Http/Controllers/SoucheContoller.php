<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souche;
use App\Famille;
use DB;

class SoucheContoller extends Controller
{
    public function index()
    {
        $cheque = DB::table('souche')->join('lescotisations', 'lescotisations.idSouche', '=', 'souche.idSouche')
        ->join('familles', 'lescotisations.id_parents', '=', 'familles.id')
        ->select('lescotisations.*', 'souche.*', 'familles.*' )
        ->get();
        $souche = DB::table('souche')
        ->get();
        return view('bilansouche',compact('cheque','souche'));
    }

    public function create(){
        $cheque = DB::table('lescotisations') ->get();
        $famille = DB::table('souche') ->get();

        return view('formsouche',compact('famille', 'cheque'));
    }

    public function store(Request $request){
        $data = array();
        $data['souche'] = $request-> souche;
        $cheque = DB::table('souche')->insert($data);
        return redirect()->route('bilansouche')
                        -> with('success', 'Souche créé avec succès ! ');
    }

    public function edit($id){
        $famille = DB::table('lescotisations') ->get();
        $cheque = DB::table('souche')->join('lescotisations', 'lescotisations.idSouche', '=', 'souche.idSouche')
        ->select('familles.*', 'souche.*' )
        ->where('souche.idSouche',$id)->first()
;
        return view('modifsouche', compact('famille','cheque'));
    }

    public function update(Request $request, $id){
        $data = array();
        $data['souche'] = $request-> souche;
        $cheque = DB::table('souche')->where('idSouche', $id)-> update($data);
        return redirect()->route('bilansouche')
                        -> with('success', 'Souche modifiée avec succès ! ');
    }
    
    public function delete(Request $request, $id){
        $cheque = DB::table('souche')->where('idSouche', $id)-> delete();
        return redirect()->route('bilansouche')
                        -> with('success', 'Souche supprimée avec succès ! ');
    }
}
