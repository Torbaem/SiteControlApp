@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Post')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-editors.js')}}"></script>

@endsection

@section('content')
<h4>Nuevo Post</h4>

<a href="{{ route ('pages-messages') }}" class="btn rounded-pill btn-icon btn-label-primary bx bx-left-arrow-alt ">
</a><br><br>

<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-items-center">
      <!-- Aquí puede ir algún encabezado si es necesario -->
  </div>
  <div class="card-body">
      <form action="{{ route('pages-messages-store') }}" method="POST">
          @csrf
          <div class="mb-3">
              <label class="form-label" for="basic-default-message">Mensaje</label>
              <textarea name="content" id="basic-default-message" class="form-control" placeholder="Escribe aquí tu mensaje o nota"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  </div>
</div>




@endsection
