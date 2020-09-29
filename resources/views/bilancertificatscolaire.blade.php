@extends('layouts.frontend.bilanmaster')
@section('title', 'Élève')
@section('titletable', 'Liste des Élèves')
@section('content')
<style>
    a[class^="fas fa-trash-alt"]::before {
        color: red;
    }
</style>
    <div class="row">
      
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p> {{ $message }} </p>
            </div> 
        @endif
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/eleve/pdf') }}">Générer la liste des élèves</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th width=150px>Nom de familles</th>
                <th width=150px>Prénom de l'Eleve</th>
                <th width=150px>Classe</th>
                <th width=150px>Date de Naissance</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($eleves as $unEleve)
            <tr>
                <td>{{$unEleve->nom_de_famille}}</td>
                <td>{{$unEleve->prenom_eleve}}</td>
                <td>{{$unEleve->nom_de_classe}}</td>
                <td>{{$unEleve->date_naiss}}</td>
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="btn btn-info" href="{{ URL::to('/oneelve/pdf/'.$unEleve->id) }}">Générer un Certificat de scolarité</a>
                      @elseif (auth()->user()->isAuthor())
                      <a class="btn btn-info" href="{{ URL::to('/oneelev/pdf/'.$unEleve->id) }}">Générer un Certificat de scolarité</a>
                      @else
                        
                      @endif
                    @endif
                    
                    
                    
                </td>
            </tr>
            
            @endforeach
        </table>
        
        <div class="col-sm-6">
            <div class="pull-right">
           
            
            </div>
        </div>
    </div>
@endsection

