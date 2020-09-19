@extends('layouts.frontend.formmaster')
@section('title', 'Enregister une Cotisation')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Modifier une cotisation </p>
        
        <form action="{{ url('cotismodif/'.$cotisation->id) }}" method="get" enctype="multipart/form-data">
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
            <select class="browser-default custom-select" name="benevolat" size="1" id="test">
              <option value = "">--Bénévolat ?--</option>
              <option value="true">Oui</option>
              <option value="false">Non</option>
            </select>
        </div>
        <div class="input-group mb-3">
        <select class="browser-default custom-select" name="mois" size="1" id="test">
              <option value = "">--Veuillez selectionner la mois concerné :--</option>
              <option value="Janvier">Janvier</option>
              <option value="Fevrier">Février</option>
              <option value="Mars">Mars</option>
              <option value="Avril">Avril</option>
              <option value="Mai">Mai</option>
              <option value="Juin">Juin</option>
              <option value="Septembre">Septembre</option>
              <option value="Octobre">Octobre</option>
              <option value="Novembre">Novembre</option>
              <option value="Decembre">Décembre</option>
            </select>
        </div>
        <div class="input-group mb-3">
        <select class="browser-default custom-select" name="type_de_paiement" size="1" id="test">
              <option value = "">--Type de paiement ?--</option>
              <option value="cheque">Chèque</option>
              <option value="prelevement">Prélèvement</option>
              <option value="virement">Virement</option>
              <option value="espece">Espèce</option>
              <option value="paypal">PayPal</option>
            </select>
        </div>
        
        <div class="input-group mb-3">
          <input type="text" name="montant" class="form-control" value="{{ $cotisation->montant }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-dollar-sign"></span>
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