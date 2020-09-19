@extends('layouts.frontend.bilanmaster')
@section('title', 'Cotisations')
@section('titletable', 'Liste Cotisations')
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
                <th width=150px>Nombre d'enfant(s)</th>
                <th width=150px>Bénévolat</th>
                <th width=150px>Mois</th>
                <th width=150px>Type de paiement</th>
                <th width=150px>Type de cotisation</th>
                <th width=150px>Montant</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($cotisation as $uneCotisation)
            <tr>
                <td>{{$uneCotisation->nom_de_famille}}</td>
                <td>
                @if(is_null($uneCotisation->nombre_d_enfants))
                    0
                @else
                    {{$uneCotisation->nombre_d_enfants}}
                @endif
                </td>
                <td>{{$uneCotisation->benevolat}}</td>
                <td>{{$uneCotisation->mois}}</td>
                <td>{{$uneCotisation->type_de_cotisation}}</td>
                <td>{{$uneCotisation->type_de_paiement}}</td>
                <td>{{$uneCotisation->montant}}</td>
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    <a class="nav-icon fas fa-edit" href="{{ URL::to('modifcotis/'.$uneCotisation->id) }}"></a>
                    <a class="fas fa-trash-alt" href="{{ URL::to('suppcotis/'.$uneCotisation->id) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="col-sm-6">
            <div class="pull-right">
            <a class="btn btn-primary btn-success" href="{{ route('formcotis') }}">Ajouter une cotisation</a>
            </div>
        </div>
    </div>
    </div>
       
    
@endsection

@section('titlestat', 'Statistiques')
@section('stats')
 
    <script>
      var mois = JSON.parse("{{ json_encode($datamois) }}");
      var moiscantine = JSON.parse("{{ json_encode($datamoiscantine) }}");
      var cout = JSON.parse("{{ json_encode($couttotal) }}");
    </script>
    
    <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Stats</h3>
                </div>
              </div>
              <div class="card-body">
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                  
                </div>
                
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                  <p style="color:#d16852";>Encaissé</p>
                  </span>

                  <span>
                  <p style="color:#f8d361";>Attendu</p>
                  </span>
                </div>
            </div>
    </div>
    <!-- Content Header (Page header) -->
    
    <!-- /.content -->
            <!-- /.card -->

            
        
        <script src="{{asset('style/frontend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('style/frontend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('style/frontend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('style/frontend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('style/frontend/dist/js/demo.js')}}"></script>
<script src="{{asset('style/frontend/dist/js/pages/dashboard3.js')}}"></script>

<!-- page script -->
@endsection