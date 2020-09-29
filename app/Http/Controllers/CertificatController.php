<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificatController extends Controller
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
        
        return view('bilancertificatscolaire',compact('eleves'));
    }
    public function createPDF() {
        // retreive all records from db
        $eleves = DB::table('eleve')->join('familles', 'familles.id', '=', 'eleve.id_parent')
        ->join('classes', 'classes.idClasse', '=', 'eleve.id_classe')
        ->select('familles.nom_de_famille', 'classes.*', 'eleve.*' )
        ->get();
  
        // share data to view
        view()->share('eleves',$eleves);
        $pdf = PDF::loadView('pdf_view', $eleves);
  
        // download PDF file with download method
        return $pdf->download('liste_eleves.pdf');
    }

    public function createPDFforOneUser($id) {
        
        // retreive all records from db
        $eleves = DB::table('eleve')->join('familles', 'familles.id', '=', 'eleve.id_parent')
        ->join('classes', 'classes.idClasse', '=', 'eleve.id_classe')
        ->select('familles.nom_de_famille', 'classes.*', 'eleve.*' )
        ->where('eleve.id', '=', $id)
        ->get();
  
        // share data to view
        view()->share('eleves',$eleves);
        $pdf = PDF::loadView('pdf_view_user', $eleves);
  
        // download PDF file with download method
        return $pdf->download('certificatscolarite.pdf');
    }
}
