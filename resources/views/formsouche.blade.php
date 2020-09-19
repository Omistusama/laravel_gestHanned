@extends('layouts.frontend.formmaster')
@section('title', 'Enregister une souche')
@section('content')
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Enregistrer une nouvelle souche </p>
        
        <form action="{{ route('lasouche') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="souche" class="form-control" placeholder="Souche">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Enrgistrer</button>
          </div>

        
      </form>

      </div>
      <!-- /.form-box -->
  </div><!-- /.card -->
@endsection