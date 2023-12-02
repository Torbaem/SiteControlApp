@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Fingerinout
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Fingerinout</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('fingerinouts.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('fingerinout.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
