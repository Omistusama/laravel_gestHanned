<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cheque;
use App\Famille;
use DB;

class ChequeContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cheque = DB::table('familles')->join('cheque', 'familles.id', '=', 'cheque.id_parent')
        ->select('familles.*', 'cheque.*' )
        ->get();
        return view('bilancheque',compact('cheque'));
    }

    public function create(){
        $cheque = DB::table('cheque') ->get();
        $famille = DB::table('familles') ->get();

        return view('formcheque',compact('famille', 'cheque'));
    }

    public function store(Request $request){
        $data = array();
        $data['id_parent'] = $request-> id_parent;
        $data['souche'] = $request-> souche;
        $data['montant'] = $request-> montant;
        $cheque = DB::table('cheque')->insert($data);
        return redirect()->route('bilancheque')
                        -> with('success', 'Cheque créé avec succès ! ');
    }

    public function edit($id){
        $famille = DB::table('familles') ->get();
        $cheque = DB::table('cheque')->join('familles', 'familles.id', '=', 'cheque.id_parent')
        ->select('familles.nom_de_famille', 'cheque.*' )
        ->where('cheque.idCheque',$id)->first()
;
        return view('modifcheque', compact('famille','cheque'));
    }

    public function update(Request $request, $id){
        $data = array();
        $data['id_parent'] = $request-> id_parent;
        $data['souche'] = $request-> souche;
        $data['montant'] = $request-> montant;
        $cheque = DB::table('cheque')->where('idCheque', $id)-> update($data);
        return redirect()->route('bilancheque')
                        -> with('success', 'Cheque modifiée avec succès ! ');
    }
    
    public function delete(Request $request, $id){
        $cheque = DB::table('cheque')->where('idCheque', $id)-> delete();
        return redirect()->route('bilancheque')
                        -> with('success', 'Cheque supprimée avec succès ! ');
    }
}
