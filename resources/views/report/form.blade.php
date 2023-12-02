<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fingerprint_id') }}
            {{ Form::text('fingerprint_id', $report->fingerprint_id, ['class' => 'form-control' . ($errors->has('fingerprint_id') ? ' is-invalid' : ''), 'placeholder' => 'Fingerprint Id']) }}
            {!! $errors->first('fingerprint_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $report->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_entrada') }}
            {{ Form::text('fecha_entrada', $report->fecha_entrada, ['class' => 'form-control' . ($errors->has('fecha_entrada') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrada']) }}
            {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_salida') }}
            {{ Form::text('fecha_salida', $report->fecha_salida, ['class' => 'form-control' . ($errors->has('fecha_salida') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Salida']) }}
            {!! $errors->first('fecha_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_notes') }}
            {{ Form::text('user_notes', $report->user_notes, ['class' => 'form-control' . ($errors->has('user_notes') ? ' is-invalid' : ''), 'placeholder' => 'User Notes']) }}
            {!! $errors->first('user_notes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('admin_notes') }}
            {{ Form::text('admin_notes', $report->admin_notes, ['class' => 'form-control' . ($errors->has('admin_notes') ? ' is-invalid' : ''), 'placeholder' => 'Admin Notes']) }}
            {!! $errors->first('admin_notes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>