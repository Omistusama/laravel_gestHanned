@extends('layouts.frontend.formmaster')
@section('title', 'Enregister une cotisation')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Enregistrer une nouvelle cotisation </p>
        
        <form action="{{ route('lacotis') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <select class="browser-default custom-select" name="id_parents" size="1" id="test">
                <option value = "">--Veuillez choisir un nom de famille--</option>
                @foreach($famille as $uneFamille)
                  <option value="{{$uneFamille->id}}">{{$uneFamille->nom_de_famille}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
          @foreach($famille as $uneCotisation)
            <input type="text" name="nombre_enfants" class="form-control" value="{{$uneCotisation->nombre_d_enfants}}"  readonly="readOnly">
          @endforeach
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
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
        <select class="browser-default custom-select" name="type_de_cotisation" size="1" id="test">
              <option value = "">--Type de Cotisation ?--</option>
              <option value="cantine">Cantine</option>
              <option value="etude">Etude</option>
              <option value="frais_scolaire">Frais de scolarité</option>
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
          <input type="text" name="montant" class="form-control" placeholder="Montant">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-dollar-sign"></span> 
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="browser-default custom-select" name="idSouche" size="1" id="test">
                <option value = "">--Veuillez choisir une souche--</option>
                @foreach($souche as $uneSouche)
                  <option value="{{$uneSouche->idSouche}}">{{$uneSouche->souche}}</option>
                @endforeach
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