@extends('layouts.app')

@section('template_title')
    {{ $fingerprint->name ?? "{{ __('Show') Fingerprint" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Fingerprint</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fingerprints.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $fingerprint->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
