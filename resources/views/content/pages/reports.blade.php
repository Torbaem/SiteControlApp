@php
$configData = Helper::appClasses();



@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes')

@section('content')
<!-- resources/views/reports/index.blade.php -->

<h1>Listado de Reportes</h1>
<a href="{{ route('pages-reports-create') }}" class="btn btn-outline-primary">Crear un Nuevo Reporte</a><br><br>


<div class="card">
  <h5 class="card-header">Entradas y salidas</h5>
  <div class="card-body">
      <table class="table">
          <thead>
              <tr>
                  <th>ID de Huella</th>
                  <th>Nombre</th>
                  <th>Action</th>
                  <th>Fecha</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($fingerinouts as $fingerinout)
            <tr>
                <td>{{ $fingerinout->fingerprint_id }}</td>
                <td>
                    @if($fingerinout->fingerprint && $fingerinout->fingerprint->user)
                        {{ $fingerinout->fingerprint->user->name }}
                    @else
                        No se encontró el usuario
                    @endif
                </td>
                <td>{{ $fingerinout->action }}</td>
                <td>{{ $fingerinout->created_at}}</td>
            </tr>
        @endforeach
          </tbody>
      </table>
  </div>
</div>
<br><br><br>


<div class="card">
  <h5 class="card-header">Reportes de entradas y salidas</h5>
  <div class="table-responsive text-nowrap">
      <table class="table">
          <thead>
              <tr>
                  <th>ID Del Reporte</th>
                  <th> Nombre de Usuario</th>
                  <th>Fecha de Entrada</th>
                  <th>Fecha de Salida</th>
                  <th>Nota del Usuario</th>
                  <th>Nota del Administrador</th>
                  <th>Fecha del Reporte</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tbody>
              @foreach($reports as $report)
              <tr>
                  <td>{{ $report->id }}</td>
                  <th>{{$report ->nombre}}</th>
                  <td>{{ $report->fecha_entrada }}</td>
                  <td>{{ $report->fecha_salida }}</td>
                  <td>{{ $report->user_notes }}</td>
                  <td>{{ $report->admin_notes }}</td>
                  <th>{{$report->created_at}}</th>
                  <td>
                      <a href="{{ route('pages-reports-show', ['id' => $report->id]) }}">Ver Detalles</a>
                      <a href="{{ route('pages-reports-edit', ['id' => $report->id]) }}">Editar</a>
                      <form action="{{ route('pages-reports-delete', ['id' => $report->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit">Eliminar</button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
          </tbody>
      </table>
  </div>
</div>


@endsection
