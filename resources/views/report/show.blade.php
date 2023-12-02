@extends('layouts.app')

@section('template_title')
    {{ $report->name ?? "{{ __('Show') Report" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Report</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reports.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fingerprint Id:</strong>
                            {{ $report->fingerprint_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $report->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrada:</strong>
                            {{ $report->fecha_entrada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Salida:</strong>
                            {{ $report->fecha_salida }}
                        </div>
                        <div class="form-group">
                            <strong>User Notes:</strong>
                            {{ $report->user_notes }}
                        </div>
                        <div class="form-group">
                            <strong>Admin Notes:</strong>
                            {{ $report->admin_notes }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
