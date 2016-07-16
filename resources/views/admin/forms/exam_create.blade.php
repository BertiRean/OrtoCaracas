{!! Form::open(['class' => 'form-horizontal', 'action' => 'ExamsController@store', 'method' => 'POST']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Paciente', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', $pacient->name ,['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', $pacient->ci, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Show Actual Date -->

    {!! Form::label('date_exam', 'Fecha de Estudio', ['class' => 'control-label']) !!}
    {!! Form::text('date_exam', null, ['class' => 'form-control', 'id' => 'datepicker'])!!}

    <!-- Input Description -->
    {!! Form::label('description', 'Descripción', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['placeholder' => 'Detalles del estudio', 'class' => 'form-control'])!!}

    <!-- Input Amount -->
    {!! Form::label('amount', 'Costo del Examen', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ['placeholder' => 'Costo del estudio', 'class' => 'form-control'])!!}

    <!-- Input Personal -->
    {!! Form::label('taked_by', 'Tomado por', ['class' => 'control-label']) !!}
    {!! Form::text('taked_by', null, ['placeholder' => 'Nombre del personal', 'class' => 'form-control'])!!}

    {!! Form::hidden('pacient_id', $pacient->id_pacient)!!}
    {!! Form::hidden('department_id', $department->id_department)!!}

    <br>
{!! Form::submit('Registrar Examen', ['class' => 'btn btn-primary'] ) !!}

            
{!! Form::close() !!}


