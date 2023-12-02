@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Reporte')

@section('content')
<!-- resources/views/reports/create.blade.php -->

<h1>Editar Reporte #{{ $report->id }}</h1>

<form action="{{ route('pages-reports-update', ['id' => $report->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Campos del formulario para editar el reporte -->
    <label for="fingerprint_id">ID de Huella:</label>
    <input type="text" name="fingerprint_id" id="fingerprint_id" value="{{ $report->fingerprint_id }}">

    <label for="user_notes">Notas del Usuario:</label>
    <textarea name="user_notes" id="user_notes">{{ $report->user_notes }}</textarea>

    <label for="admin_notes">Notas del Administrador:</label>
    <textarea name="admin_notes" id="admin_notes">{{ $report->admin_notes }}</textarea>

    <button type="submit">Actualizar Reporte</button>
</form>
@endsection
