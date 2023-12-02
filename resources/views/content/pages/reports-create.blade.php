@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Reporte')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gauge-chart/dist/gauge-chart.min.js"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/cards-analytics.js') }}"></script>


@endsection

@section('content')
<h1>Crear Nuevo Reporte</h1>
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Creando Reporte</h5>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('pages-reports-store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="fingerprint_id">ID de Huella</label>
                <select name="fingerprint_id" class="form-control" id="fingerprint_id" required>
                    <option value="">Seleccionar ID de Huella</option>
                    @foreach($fingerprints as $fingerprint)
                    <option value="{{ $fingerprint->id }}" data-userid="{{ $fingerprint->user_id }}">
                        {{ $fingerprint->id }}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" readonly required/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="fecha_entrada">Fecha de Entrada</label>
                <input type="datetime-local" name="fecha_entrada" class="form-control" id="fecha_entrada"/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="fecha_salida">Fecha de Salida</label>
                <input type="datetime-local" name="fecha_salida" class="form-control" id="fecha_salida"/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="user_notes">Notas del Usuario</label>
                <textarea name="user_notes" class="form-control" id="user_notes"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="admin_notes">Notas del Administrador</label>
                <textarea name="admin_notes" class="form-control" id="admin_notes"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>


      </div>
  </div>
</div>


@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#fingerprint_id').change(function () {
            var userId = $(this).find('option:selected').data('userid');
            var url = "{{ route('getUserName', ':id') }}";
            url = url.replace(':id', userId);

            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    $('#nombre').val(response.name);
                },
                error: function () {
                    $('#nombre').val('No se encontró el usuario');
                }
            });
        });
    });
</script>
@endpush
