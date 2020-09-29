@extends('layouts.frontend.bilanmaster')
@section('title', 'Parents')
@section('titletable', 'Liste Familles')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('jqueryui/jquery-ui.min.css')}}">

<!-- Script -->
<script src="{{asset('jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>

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
                <th width=150px>Nom de famille</th>
                <th width=150px>Prénom Parent</th>
                <th width=100px>Nombre d'enfants</th>
                <th width=200px>Email</th>
                <th width=150px>Numero Tel</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($famille as $uneFamille)
            <tr>
                <td>{{$uneFamille->nom_de_famille}}</td>
                <td>{{$uneFamille->prenom_parents}}</td>
                <td>{{$uneFamille->nombre_d_enfants}}</td>
                <td>{{$uneFamille->email}}</td>
                <td>{{$uneFamille->numero_tel}}</td>
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modiffam/'.$uneFamille->id) }}"></a>
                      @elseif (auth()->user()->isAuthor())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modiffam/'.$uneFamille->id) }}"></a>
                      @else
                        
                      @endif
                    @endif
                    
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="fas fa-trash-alt" href="{{ URL::to('suppfam/'.$uneFamille->id) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
                      @elseif (auth()->user()->isAuthor())
                      @else
                      @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-sm-6">
            <div class="pull-right">
            @if (auth()->check())
              @if (auth()->user()->isAdministrator())
              <a class="btn btn-primary btn-success" href="{{ route('formparent') }}">Ajouter une famille</a>
              @elseif (auth()->user()->isAuthor())
              <a class="btn btn-primary btn-success" href="{{ route('formparent') }}">Ajouter une famille</a>
              @else
              @endif
            @endif
            
            </div>
           
        </div>
        
    </div>
@endsection