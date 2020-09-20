<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Famille;

use DB;

class ParentFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $famille = DB::table('familles') ->paginate(15);
        
        return view('bilanparent',compact('famille'));
    }

    public function create(){
        return view('formparent');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $famille = DB::table('familles')->where('nom_de_famille', 'like', '%'.$search.'%')->paginate(10);
        return view('bilanparent', ['famille' => $famille]);
    }
    public function store(Request $request){
        $data = array();
        $enfanttest = DB::table('familles')	->whereNotNull('nombre_d_enfants')
        ->get();
        $data['nom_de_famille'] = $request-> nom_de_famille;
        $data['prenom_parents'] = $request-> prenom_parents;
        $data['nombre_d_enfants'] = 0;
        $data['email'] = $request-> email;
        $data['numero_tel'] = $request-> numero_tel;
        $famille = DB::table('familles')->insert($data);
        
        return redirect()->route('bilanparent')
                        -> with('success', 'Famille créé avec succès ! ');
    }

    public function edit($id){
        $famille = DB::table('familles')->where('id',$id)->first();
        return view('modiffam', compact('famille'));
    }

    public function update(Request $request, $id){
        $data = array();
        $data['nom_de_famille'] = $request-> nom_de_famille;
        $data['prenom_parents'] = $request-> prenom_parents;
        $data['nombre_d_enfants'] = $request-> nombre_d_enfants;
        $data['email'] = $request-> email;
        $data['numero_tel'] = $request-> numero_tel;
        $famille = DB::table('familles')->where('id', $id)-> update($data);
        return redirect()->route('bilanparent')
                        -> with('success', 'Famille modifiée avec succès ! ');
    }
    
    public function delete(Request $request, $id){
        $famille = DB::table('familles')->where('id', $id)-> delete();
        return redirect()->route('bilanparent')
                        -> with('success', 'Famille supprimée avec succès ! ');
    }
}
