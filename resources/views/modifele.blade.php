@extends('layouts.frontend.formmaster')
@section('title', 'Enregister un élève')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Modifier un élève </p>
        
        <form action="{{ url('elemodif/'.$eleves->id) }}" method="get" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
        <select class="browser-default custom-select" name="id_parent" size="1" id="test">
            <option value = "">--Veuillez choisir un nom de famille--</option>
              @foreach($famille as $uneFamille)
                <option value="{{$uneFamille->id}}" selected>{{$uneFamille->nom_de_famille}}</option>
              @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="prenom_eleve" class="form-control" value="{{ $eleves->prenom_eleve }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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