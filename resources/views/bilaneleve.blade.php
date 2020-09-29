@extends('layouts.frontend.bilanmaster')
@section('title', 'Élève')
@section('titletable', 'Liste Élèves')
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
                <th width=150px>Prénom Eleve</th>
                <th width=150px>Classe</th>
                <th width=150px>Autres</th>
                <th width=100px>Actions</th>
            </tr>
            @foreach($eleves as $unEleve)
            <tr>
                <td>{{$unEleve->nom_de_famille}}</td>
                <td>{{$unEleve->prenom_eleve}}</td>
                <td>{{$unEleve->nom_de_classe}}</td>
                <td>{{$unEleve->type_cotisation}}</td>
                <td>
                    <!-- <a class="btn btn-info" href="">Détails</a> -->
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modifele/'.$unEleve->id) }}"></a>
                      @elseif (auth()->user()->isAuthor())
                      <a class="nav-icon fas fa-edit" href="{{ URL::to('modifele/'.$unEleve->id) }}"></a>
                      @else
                        
                      @endif
                    @endif
                    
                    @if (auth()->check())
                      @if (auth()->user()->isAdministrator())
                      <a class="fas fa-trash-alt" href="{{ URL::to('suppele/'.$unEleve->id) }}" onclick="return confirm('Êtes-vous sûr(e) ?')"></a>
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
              <a class="btn btn-primary btn-success" href="{{ route('formeleve') }}">Ajouter un(e) eleve</a>
              @elseif (auth()->user()->isAuthor())
              <a class="btn btn-primary btn-success" href="{{ route('formeleve') }}">Ajouter un(e) eleve</a>
              @else
              @endif
            @endif
          
            </div>
        </div>
    </div>
@endsection

@section('stats')
  <script>
    var cantine = JSON.parse("{{ json_encode($cantine) }}");
    var panier = JSON.parse("{{ json_encode($panier) }}");
    var externe = JSON.parse("{{ json_encode($externe) }}");

    var etude = JSON.parse("{{ json_encode($etude) }}");
    var pasetude = JSON.parse("{{ json_encode($pasetude) }}");

    </script> 
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Statistiques</h1>
          </div>
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <!-- AREA CHART -->
           
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Cantine</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            

          </div>
          <!-- /.col (LEFT) -->
<!-- PIE CHART -->
<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etude</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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