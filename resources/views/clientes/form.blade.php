<div class="card col-md-12">
    <div class="card-body">
        <div class="form-group col-sm-12">
            <div class="form-group">
                {!! Form::label('documento', 'Documento') !!}
                {!! Form::text('documento', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombres', 'Nombres') !!}
                {!! Form::text('nombres', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos') !!}
                {!! Form::text('apellidos', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono') !!}
                {!! Form::number('telefono', null, ['class' => 'form-control', 'required', 'max' => '9999999999', 'maxlength' => 10]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lat', 'Latitud') !!}
                {!! Form::text('lat', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lng', 'longitud') !!}
                {!! Form::text('lng', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('ruta', 'Rutas') !!}
                <select name="rutas_id" class="custom-select" required>
                <option value="{{old('rutas_id' , $rutas)}}" disabled selected>--Selecione una opcion--</option>
                @foreach ($rutas as $key => $rt)
                    <option value="{{ $key }}">{{ $rt }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                {{ Form::submit('Registrar', ['class' => 'btn btn-sm btn-primary', 'id' => 'boton']) }}
            </div>
        </div>
    </div>
</div>
