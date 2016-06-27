{!! Form::open(['class' => 'form-horizontal', 'action' => 'DatesController@store', 'method' => 'POST']) !!}

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
    {!! Form::label('consult_date', 'Fecha de Cita', ['class' => 'control-label']) !!}
    {!! Form::text('consult_date', null, ['class' => 'form-control', 'id' => 'datepicker'])!!}

    <br>
{!! Form::submit('Registrar Cita', ['class' => 'btn btn-primary'] ) !!}

            
{!! Form::close() !!}


