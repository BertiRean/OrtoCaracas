

{!! Form::model($pacient, ['route' => ['admin.pacient.update', $pacient->id_pacient],'method' => 'PUT','class' => 'form-horizontal']) !!}

    {!! csrf_field() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', null ,['placeholder' => 'Ej: Antonio Berti', 'class' => 'form-control']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', null, ['placeholder' =>  'Ej: V-24.409.499', 'class' => 'form-control']) !!}

    <!-- Input Phone -->
    <?php 
      $count = 1;
    ?>
    @foreach($pacient->phones as $phone)
      {!! Form::label('phone'.$count, 'Telefono ' . $count, ['class' => 'control-label']) !!}
      {!! Form::text('phone'.$count, $phone["phone_number"], ['placeholder' => 'Ej: 04262766415', 'class' => 'form-control']) !!}
      <?php $count  = $count +1;?>
    @endforeach

    <!-- Input Address -->
    {!! Form::label('address', 'Direccion', ['class' => 'control-label']) !!}
    {!! Form::text('address', $pacient->contact["address"], ['placeholder' => 'Ej: Calle Colon', 'class' => 'form-control']) !!}

    <!-- Input Phone -->

    {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
    {!! Form::email('email', $pacient->contact["email"], ['placeholder' => 'Ej: tplaza15@gmail.com', 'class' => 'form-control']) !!}

    <!-- Input Sex -->
    {!! Form::label('sex', 'Sexo', ['class' => 'control-label']) !!}
    {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Femenino'], $pacient->sex, ['class' => 'form-control']) !!}
    

    <!-- Input Birth Date -->
    {!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'control-label']) !!}
    {!! Form::text('birth_date', $pacient->birth_date, ['class' => 'form-control', 'id' => 'datepicker'])!!}
    <br>
  {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-success']) !!}
            
{!! Form::close() !!}