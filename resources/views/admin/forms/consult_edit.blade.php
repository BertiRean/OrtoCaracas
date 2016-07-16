{!! Form::model($consult, ['route' => ['admin.consults.update', $consult->id_consult],'method' => 'PUT','class' => 'form-horizontal']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Paciente', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', $consult->pacient['name'] ,['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', $consult->pacient['ci'], ['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Select Box Doctors -->

    {!! Form::label('doctor', 'Doctor Asignado', ['class' => 'control-label']) !!}
    {!! Form::select('doctor', $doctors, null, ['class' => 'form-control']) !!}

    <!-- Date Picker -->
    {!! Form::label('consult_date', 'Fecha de Consulta', ['class' => 'control-label']) !!}
    {!! Form::text('consult_date', $consult->date_consult->format('d/m/Y'), ['class' => 'form-control', 'id' => 'datepicker'])!!}

    <!-- Input Description -->
    {!! Form::label('description', 'Procedimiento Realizado', ['class' => 'control-label']) !!}
    {!! Form::text('description', $consult->description, ['placeholder' => 'Descripcion del procedimiento', 'class' => 'form-control'])!!}

    <!-- Input Description -->
    {!! Form::label('observations', 'Observaciones', ['class' => 'control-label']) !!}
    {!! Form::text('observations', $consult->observations, ['placeholder' => 'Observaciones', 'class' => 'form-control'])!!}

    <!-- Input Amount -->
    {!! Form::label('amount', 'Monto', ['class' => 'control-label']) !!}
    {!! Form::text('amount', $consult->amount, ['placeholder' => 'Monto pagado', 'class' => 'form-control'])!!}


    {!! Form::hidden('pacient_id', $consult->pacient['id_pacient'])!!}

    <br>
  {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-success']) !!}
            
{!! Form::close() !!}