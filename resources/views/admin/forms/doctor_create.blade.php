{!! Form::open(['class' => 'form-horizontal', 'action' => 'DoctorsController@store', 'method' => 'POST']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('name', 'Nombre Completo', ['class' => 'control-label', 'id' => 'pacient-name']) !!}
    {!! Form::text('name', null ,['placeholder' => 'Ej: Antonio Berti', 'class' => 'form-control']) !!}

    <!-- Input Ci -->

    {!! Form::label('ci', 'Cedula de Identidad', ['class' => 'control-label']) !!}
    {!! Form::text('ci', null, ['placeholder' =>  'Ej: V-24.409.499', 'class' => 'form-control']) !!}

    <!-- Input Phone -->

    {!! Form::label('phone', 'Telefono', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['placeholder' => 'Ej: 04262766415', 'class' => 'form-control']) !!}

    <!-- Input Phone -->

    {!! Form::label('phone2', 'Telefono 2', ['class' => 'control-label']) !!}
    {!! Form::text('phone2', null, ['placeholder' => 'Ej: 04262766415', 'class' => 'form-control']) !!}

    <!-- Input Address -->
    {!! Form::label('address', 'Direccion', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['placeholder' => 'Ej: Calle Colon', 'class' => 'form-control']) !!}

    <!-- Input Phone -->

    {!! Form::label('email', 'Correo Electronico', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['placeholder' => 'Ej: tplaza15@gmail.com', 'class' => 'form-control']) !!}

    <!-- Input Sex -->
    {!! Form::label('bank_account', 'Cuenta Bancaria', ['class' => 'control-label']) !!}
    {!! Form::text('bank_account', null, ['class' => 'form-control']) !!}

    <!-- Input Select Speciality -->
    {!! Form::label('speciality', 'Especialidad #1', ['class' => 'control-label']) !!}
    {!! Form::select('speciality', $specs, null, ['class' => 'form-control']) !!}

    <br>
{!! Form::submit('Registar Doctor', ['class' => 'btn btn-primary'] ) !!}

            
{!! Form::close() !!}


