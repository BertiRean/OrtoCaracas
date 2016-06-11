{!! Form::model($doctor, ['route' => ['admin.doctor.update', $doctor->id_doctor],'method' => 'PUT','class' => 'form-horizontal']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label', 'id' => 'doctor-name']) !!}
    {!! Form::text('name', $doctor->name ,['class' => 'form-control']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', $doctor->ci, ['class' => 'form-control']) !!}

    <!-- Input Phone -->

    <?php 
        $count = 1;
    ?>

    @foreach($doctor->phones as $phone)

      {!! Form::label('phone'.$count, 'Telefono ' . $count, ['class' => 'control-label']) !!}
      {!! Form::text('phone'.$count, $phone["phone_number"], ['class' => 'form-control']) !!}
      <?php $count++;?>

    @endforeach

    <!-- Input Address -->
    {!! Form::label('address', 'Direccion', ['class' => 'control-label']) !!}
    {!! Form::text('address', $doctor->contact["address"], ['class' => 'form-control']) !!}

    <!-- Input Phone -->

    {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
    {!! Form::email('email', $doctor->contact["email"], ['class' => 'form-control']) !!}

    <!-- Input Sex -->
    {!! Form::label('bank_account', 'Cuenta Bancaria', ['class' => 'control-label']) !!}
    {!! Form::text('bank_account', $doctor->bank_account, ['class' => 'form-control']) !!}

    <?php $count = 1 ?>

    @foreach($doctor->specs as $spec)
      {!! Form::label('speciality'.$count, 'Especialidad #1', ['class' => 'control-label']) !!}
      {!! Form::select('speciality'.$count, $specialities, $spec->name, ['class' => 'form-control']) !!}
      <?php $count++ ?>
    @endforeach

    <br>
  {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-success']) !!}
            
{!! Form::close() !!}