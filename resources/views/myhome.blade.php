@extends('layouts.frontend.master')
@section('title', 'Home')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Acceuil</h1>
            <p>
              @if (auth()->check())
                  @if (auth()->user()->isAdministrator())
                    Connécté(e) en tant qu'Admin.
                  @elseif (auth()->user()->isAuthor())
                    Connécté(e) en tant qu'Auteur.
                  @else
                    Connécté(e) en tant qu'Utisiateur Standard.
                  @endif
              @endif
            </p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Cotisations</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                    <span>Cotisation en fonction du mois</span>
                  </p>
                 
                </div>
                <!-- /.d-flex -->

                
                <script>
                var mavariablerecup = JSON.parse("{{ json_encode($data) }}");
                var mavariablerecupbis = JSON.parse("{{ json_encode($databis) }}");
                var mavariablerecupthird = JSON.parse("{{ json_encode($datathird) }}");
                var mavariablerecupfourth = JSON.parse("{{ json_encode($datafourth) }}");
                </script>
                  
                     
                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200">
                  
                  </canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Ce mois-ci
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Le mois dernier
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Nombre d'élèves allant à l'étude et à la cantine</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Mensuel</span>
                  </p>
                  
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Ce mois-ci
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Le mois dernier
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>  <!-- /.content-wrapper -->
  @endsection