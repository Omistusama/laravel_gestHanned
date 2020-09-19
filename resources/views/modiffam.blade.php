@extends('layouts.frontend.formmaster')
@section('title', 'Enregister une famille')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Modifier une famille </p>
        
        <form action="{{ url('fammodif/'.$famille->id) }}" method="get" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="nom_de_famille" class="form-control" value="{{ $famille->nom_de_famille }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="prenom_parents" class="form-control" value="{{ $famille->prenom_parents }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="nombre_d_enfants" class="form-control" value="{{ $famille->nombre_d_enfants }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" value="{{ $famille->email }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-at"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="numero_tel" class="form-control" value="{{ $famille->numero_tel }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Enrgistrer</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      </div>
      <!-- /.form-box -->
  </div><!-- /.card -->
@endsection