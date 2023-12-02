
@php
$configData = Helper::appClasses();
$groupedMessages = $messages->groupBy(function ($message) {
    return $message->created_at->format('Y-m-d'); // Agrupar mensajes por fecha
});
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Mensajes')

@section('content')
    <h4>Muro de Mensajes</h4>

    <a href="{{ route ('pages-messages-create') }}" class="btn rounded-pill btn-icon btn-label-primary bx bx-plus "></a><br><br>



    @foreach($groupedMessages as $date => $messages)
        <h5>{{ \Carbon\Carbon::parse($date)->format('j M, Y') }}</h5> <!-- Mostrar fecha en el formato deseado -->
        <div class="row">
            @foreach($messages as $message)
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="card border-secondary">
                  <div class="card-body">
                      <h5 class="card-title font-weight-bold mb-3">{{ $message->user->name }}</h5>
                      <p class="card-text mb-4">{{ $message->content }}</p>
                      <p style="text-align: right" class="card-text text-muted text-right">
                          <small>{{ $message->created_at->format('h:i A') }}</small>
                      </p>
                  </div>
              </div>
          </div>
            @endforeach
        </div>
    @endforeach
@endsection
