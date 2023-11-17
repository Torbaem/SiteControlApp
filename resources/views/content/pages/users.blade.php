@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la Aplicación</h4>
<div class="card">
  <div class="table-responsive text-nowrap">
    <a href="{{route('pages-users-create')}}" class="btn btn-outline-primary">Añadir Nuevo Usuario</a><br><br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Creado en:</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->id}}</td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email}}</td>
              <td>{{ $user->created_at}}</td>
              <td><a href="{{ route('pages-users-show', $user->id) }}" class="btn rounded-pill btn-secondary">Editar</a> | <a href="{{ route('pages-users-destroy', $user->id) }}" class="btn rounded-pill btn-danger">Borrar</a> </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
