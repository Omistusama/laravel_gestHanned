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
        <form action="/search" method="get" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="search" class="form-control" name="search"
                    placeholder="Recherche de nom de famille"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="fas fa-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- <input type="text" id='employee_search'>

    For displaying selected option value from autocomplete suggestion 
    <input type="text" id='employeeid' readonly>

     Script 
    <script type="text/javascript">

    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#employee_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{route('famille.getFamille')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           // Set selection
           $('#employee_search').val(ui.item.label); // display the selected text
           $('#employeeid').val(ui.item.value); // save selected id to input
           return false;
        }
      });

    });
    </script> -->
        
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
                    <a class="nav-icon fas fa-edit" href="{{ URL::to('modiffam/'.$uneFamille->id) }}"></a>
                    <a class="fas fa-trash-alt" href="{{ URL::to('suppfam/'.$uneFamille->id) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-sm-6">
            <div class="pull-right">
            <a class="btn btn-primary btn-success" href="{{ route('formparent') }}">Ajouter une famille</a>
            </div>
           
        </div>
        <div class="row">
            <div class="col-12 text-center">
                {{$famille-> links()}}
            </div>
        </div>
    </div>
@endsection