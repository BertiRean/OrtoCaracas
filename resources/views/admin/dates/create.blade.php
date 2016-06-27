@extends('admin.template.main')

@section('tittle', 'Registro de Doctores')


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

          @include('admin.forms.dates_create');

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  
  <script type="text/javascript">

      var max_count = 3;
      var wrapper = $(".form-horizontal");
      var add_button = $("#add");

      var x = 1;

      $(function() 
      {
        $("#datepicker").datepicker();

        add_button.click(function(e)
        {
          e.preventDefault();

          if(x < max_count)

          {
            x++;
            $(wrapper).append(
              '<br><label for="speciality" class="control-label">Especialidad #' + x + '</label>',
              '<input class="form-control" name="speciality" + x + id="speciality" type="text">',
              '<br><a href = "#" class = "btn btn-danger" id = "#remove">Eliminar</a>'
              );
          }

          $("#remove").click(function (e)
            {
              e.preventDefault();
              $(wrapper).children().last().remove();
            });

        });

      });

  </script>


@endsection



