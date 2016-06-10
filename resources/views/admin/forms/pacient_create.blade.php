{!! Form::open(['class' => 'form-horizontal', 'action' => 'PacientsController@store', 'method' => 'POST']) !!}

            {!! csrf_field() !!}

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
            {!! Form::label('sex', 'Sexo', ['class' => 'control-label']) !!}
            {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Femenino'], 'M', ['class' => 'form-control']) !!}
            

            <!-- Input Birth Date -->
            {!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'control-label']) !!}
            {!! Form::text('birth_date', null, ['class' => 'form-control', 'id' => 'datepicker'])!!}
            <br>
          {!! Form::submit('Registar Paciente', ['class' => 'btn btn-primary']) !!}
            
{!! Form::close() !!}