@extends('layouts.frontend.bilanmaster')
@section('title', 'Cheque')
@section('titletable', 'Liste Souche')
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
        <table class="table table-bordered">
            <tr>
                <th width=150px>Souche</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($souche as $uneSouche)
            <tr>
                <td>{{$uneSouche->souche}}</td>
                
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    <a class="nav-icon fas fa-edit" href="{{ URL::to('modifsouche/'.$uneSouche->idSouche) }}"></a>
                    <a class="fas fa-trash-alt" href="{{ URL::to('suppsouche/'.$uneSouche->idSouche) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-sm-6">
            <div class="pull-right">
            <a class="btn btn-primary btn-success" href="{{ route('formsouche') }}">Ajouter une souche</a>
            </div>
        </div>
        
    </div>
    <br>
    <br>
    <div class="row">

        
        <table class="table table-bordered">
            <tr>
                <th width=150px>Souche</th>
                <th width=150px>Concerné</th> 
            </tr>
            @foreach($cheque as $uneSouche)
            <tr>
                <td>{{$uneSouche->souche}}</td>
                <td> 
                    <ul>
                        <li>La famille : {{$uneSouche->nom_de_famille}} 
                        <br>
                        Le mois de : {{$uneSouche->mois}}</li>
                    </ul> 
                </td>
                
               
            </tr>
            @endforeach
        </table>
    </div>
    </div>

    
@endsection