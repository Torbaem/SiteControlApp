<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fingerprint_id') }}
            {{ Form::text('fingerprint_id', $fingerinout->fingerprint_id, ['class' => 'form-control' . ($errors->has('fingerprint_id') ? ' is-invalid' : ''), 'placeholder' => 'Fingerprint Id']) }}
            {!! $errors->first('fingerprint_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('action') }}
            {{ Form::text('action', $fingerinout->action, ['class' => 'form-control' . ($errors->has('action') ? ' is-invalid' : ''), 'placeholder' => 'Action']) }}
            {!! $errors->first('action', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>