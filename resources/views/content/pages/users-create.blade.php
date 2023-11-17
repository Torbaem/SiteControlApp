@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Usuario')

@section('content')
<h4>Creando un Usuario Nuevo</h4>

<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando Usuario</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('pages-users-store')}}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre Completo</label>
            <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" name="email" id="basic-default-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" aria-describedby="basic-default-email2" />
              <span class="input-group-text" id="basic-default-email2"></span>
            </div>
            <div class="form-text"> Puedes usar Números y letras  </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Contraseña</label>
            <input type="password" name="password" id="basic-default-password" class="form-control" placeholder="***********" />
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
