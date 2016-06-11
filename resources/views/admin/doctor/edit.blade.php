@extends('admin.template.main')

@section('tittle', 'Editar Doctor ' . $doctor->name)


@section('container')

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Body Heading -->
      <?php $icons = ['fa fa-user-md' => 'Doctores', 'fa fa-plus-square-o' => 'Editar Doctor'] ?>

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

          @include('admin.forms.doctor_edit' ,$doctor);

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



