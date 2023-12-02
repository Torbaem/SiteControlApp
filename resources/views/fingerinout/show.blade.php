@extends('layouts.app')

@section('template_title')
    {{ $fingerinout->name ?? "{{ __('Show') Fingerinout" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Fingerinout</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fingerinouts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fingerprint Id:</strong>
                            {{ $fingerinout->fingerprint_id }}
                        </div>
                        <div class="form-group">
                            <strong>Action:</strong>
                            {{ $fingerinout->action }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
