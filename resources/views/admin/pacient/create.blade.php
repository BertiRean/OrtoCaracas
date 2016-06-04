@extends('admin.template.main')

@section('tittle', 'Registro de Pacientes')


@section('container')


<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->
      <div class="row">
        <div class="col-lg-6">

        @if(count($errors) > 0)
          <div class="alert alert-danger" role = "alert">
            <ul>
              @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
              @endforeach
            </ul>
          </div>

        @endif

          {!! Form::open(['class' => 'form-horizontal', 'action' => 'PacientsController@store', 'method' => 'POST']) !!}

            {!! csrf_field() !!}

            <!-- Input Name -->
            {!! Form::label('name_pacient', 'Nombre Completo', ['class' => 'control-label']) !!}
            {!! Form::text('name_pacient', null ,['placeholder' => 'Ej: Antonio Berti', 'class' => 'form-control']) !!}

            <!-- Input Ci -->

            {!! Form::label('ci_pacient', 'Cedula de Identidad', ['class' => 'control-label']) !!}
            {!! Form::text('ci_pacient', null, ['placeholder' =>  'Ej: V-24.409.499', 'class' => 'form-control']) !!}

            <!-- Input Phone -->

            {!! Form::label('phone_pacient', 'Telefono', ['class' => 'control-label']) !!}
            {!! Form::text('phone_pacient', null, ['placeholder' => 'Ej: 04262766415', 'class' => 'form-control']) !!}

            <!-- Input Sex -->
            {!! Form::label('sex', 'Sexo', ['class' => 'control-label']) !!}
            {!! Form::select('sex', ['M' => 'Masculino', 'F' => 'Femenino'], 'M', ['class' => 'form-control']) !!}
            

            <!-- Input Birth Date -->
            {!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'control-label']) !!}
            <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control">
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
            <br>
          {!! Form::submit('Registar Paciente', ['class' => 'btn btn-primary']) !!}
            
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  
  <script type="text/javascript">
    $('.datepicker').datepicker({
      format: 'yyyy/mm/dd',
      startDate: '-3d'
    });
  </script>

@endsection



