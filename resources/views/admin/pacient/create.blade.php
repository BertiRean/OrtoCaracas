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

          @include('admin.forms.pacient_create');

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  
  <script type="text/javascript">
      $(function() 
      {
        $("#datepicker").datepicker();
      });

  </script>


@endsection



