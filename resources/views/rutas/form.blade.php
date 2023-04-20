<div class="card col-md-12">
    <div class="card-body">
        <div class="form-group col-sm-12">
            <div class="form-group">
                {!! Form::label('codigo', 'Codigo') !!}
                {!! Form::text('codigo', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {{ Form::submit('Registrar', ['class' => 'btn btn-sm btn-primary', 'id' => 'boton']) }}
            </div>
        </div>
    </div>
</div>
