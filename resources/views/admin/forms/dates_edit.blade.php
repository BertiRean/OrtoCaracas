{!! Form::model($date, ['route' => ['admin.dates.update', $date->date_id],'method' => 'PUT','class' => 'form-horizontal']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Paciente', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', $date->pacient['name'] ,['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula del Paciente', ['class' => 'control-label']) !!}
    {!! Form::text('ci', $date->pacient['ci'], ['class' => 'form-control', 'readonly' => 'readonly']) !!}

    <!-- Select Box Doctors -->

    {!! Form::label('doctor', 'Doctor Asignado', ['class' => 'control-label']) !!}
    {!! Form::select('doctor', $doctors, $date->doctor['name'], ['class' => 'form-control']) !!}

    <!-- Date Picker -->
    {!! Form::label('consult_date', 'Fecha de Cita', ['class' => 'control-label']) !!}
    {!! Form::text('consult_date', $date->date_consult->format('d/m/Y'), ['class' => 'form-control', 'id' => 'datepicker'])!!}


    {!! Form::hidden('pacient_id', $date->pacient_id)!!}

    <br>
  {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-success']) !!}
            
{!! Form::close() !!}