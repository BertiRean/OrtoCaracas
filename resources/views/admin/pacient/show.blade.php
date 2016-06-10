@extends('admin.template.main')

@section('tittle', 'Editar Paciente ' . $pacient->name)


@section('container')

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Body Heading -->
      <?php $icons = ['fa fa-user' => 'Pacientes', 'fa fa-plus-square-o' => 'Editar Paciente'] ?>

      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->
      <div class="row">
        <div class="col-lg-6">

          @include('admin.forms.pacient_edit' ,$pacient);

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



