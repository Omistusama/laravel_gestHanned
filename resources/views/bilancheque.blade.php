@extends('layouts.frontend.bilanmaster')
@section('title', 'Cheque')
@section('titletable', 'Liste Chèque')
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
                <th width=150px>Nom de famille</th>
                <th width=150px>Souche</th>
                <th width=150px>Montant</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($cheque as $unCheque)
            <tr>
                <td>{{$unCheque->nom_de_famille}}</td>
                <td>{{$unCheque->souche}}</td>
                <td>{{$unCheque->montant}}</td>
                
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modifcheque/'.$uneCotisation->id) }}"></a>
                      @elseif (auth()->user()->isAuthor())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modifcheque/'.$uneCotisation->id) }}"></a>
                      @else
                        
                      @endif
                    @endif
                    
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="fas fa-trash-alt" href="{{ URL::to('suppcheque/'.$uneCotisation->id) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
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
              <a class="btn btn-primary btn-success" href="{{ route('formcheque') }}">Ajouter un cheque</a>
              @elseif (auth()->user()->isAuthor())
              <a class="btn btn-primary btn-success" href="{{ route('formcheque') }}">Ajouter un cheque</a>
              @else
              @endif
            @endif
            
            </div>
        </div>
    </div>
    </div>
       
    
@endsection