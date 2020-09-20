@extends('layouts.frontend.formmaster')
@section('title', 'Enregister un eleve')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Enregistrer un nouvel élève </p>
        
        <form action="{{ route('famille') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <select class="browser-default custom-select" name="id_parent" size="1" id="test">
                <option value = "">--Veuillez choisir un nom de famille--</option>
                @foreach($famille as $uneFamille)
                  <option value="{{$uneFamille->id}}">{{$uneFamille->nom_de_famille}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="prenom_eleve" class="form-control" placeholder="Prénom de l'élève">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="browser-default custom-select" name="id_classe" size="1" id="test">
                <option value = "">--Veuillez choisir une classe--</option>
                @foreach($classe as $uneClasse)
                  <option value="{{$uneClasse->idClasse}}">{{$uneClasse->nom_de_classe}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
          <select class="browser-default custom-select" name="type_cotisation" size="1" id="test">
            <option value = "">--Autres--</option>
            <option value="Cantine">Cantine</option>
            <option value="Panier">Panier repas</option>
            <option value="Externe">Externe</option>
            <option value="Etude">Etude</option>
            <option value="Pas etude">Pas d'Etude</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <select class="browser-default custom-select" name="unchamp" size="1" id="test">
            <option value = "">--Statut--</option>
            <option value="Cantine">Present</option>
            <option value="Panier">Absent</option>
          </select>
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