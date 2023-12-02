@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Usuario')

@section('content')
<h1>Detalles del Reporte #{{ $report->id }}</h1>

<p>ID de Huella: {{ $report->fingerprint_id }}</p>
<p>Notas del Usuario: {{ $report->user_notes }}</p>
<p>Notas del Administrador: {{ $report->admin_notes }}</p>

<a href="{{ route('pages-reports') }}">Volver al Listado</a>
@endsection
