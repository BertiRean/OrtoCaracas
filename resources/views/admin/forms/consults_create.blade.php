{!! Form::open(['class' => 'form-horizontal', 'action' => 'ConsultsController@store', 'method' => 'POST']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Paciente', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', $pacient->name ,['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', $pacient->ci, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Select Box Doctors -->

    {!! Form::label('doctor', 'Doctor Asignado', ['class' => 'control-label']) !!}
    {!! Form::select('doctor', $doctors, null, ['class' => 'form-control']) !!}

    <!-- Date Picker -->
    {!! Form::label('consult_date', 'Fecha de Consulta', ['class' => 'control-label']) !!}
    {!! Form::text('consult_date', null, ['class' => 'form-control', 'id' => 'datepicker'])!!}

    <!-- Input Description -->
    {!! Form::label('description', 'Procedimiento Realizado', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['placeholder' => 'Descripcion del procedimiento', 'class' => 'form-control'])!!}

    <!-- Input Description -->
    {!! Form::label('observations', 'Observaciones', ['class' => 'control-label']) !!}
    {!! Form::text('observations', null, ['placeholder' => 'Observaciones', 'class' => 'form-control'])!!}

    <!-- Input Amount -->
    {!! Form::label('amount', 'Monto', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ['placeholder' => 'Monto pagado', 'class' => 'form-control'])!!}


    {!! Form::hidden('pacient_id', $pacient->id_pacient)!!}

    <br>
{!! Form::submit('Registrar Consulta', ['class' => 'btn btn-primary'] ) !!}

            
{!! Form::close() !!}