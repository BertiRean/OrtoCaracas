@extends('admin.template.main')

@section('tittle', 'Registro de Doctores')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      
      <!-- Table of Data -->
      <div class="row">
          <div class="col-lg-12">
              <h2>{{ $title_table }}</h2>

              <div class="table-responsive">
                  <table class="table table-bordered table-hover" id = "data">
                    <thead>
                        @foreach($model_labels as $table_label)
                            <th>{{$table_label}}</th>
                        @endforeach
                    </thead>

                    <tbody>
                        @foreach($pacients as $pacient)
                          <tr data-id = "{{ $pacient->id_pacient }}">
                            <td>{{ $pacient->name}} </td>
                            <td>{{ $pacient->ci }}</td>
                            <td>
                              {!! link_to_route($link_model, $title = $button_text_type, $parameters = [$pacient->id_pacient, $department], $attributes = ['class' => 'btn btn-primary']) !!}
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {!! $pacients->render() !!}
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  
  <script type="text/javascript">
    $(document).ready(function() 
    {
      $('#data').DataTable(
        {
          "language" : {
            "emptyTable": "No Hay Pacientes Registrados",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Pacientes Totales",
            "info": "Mostrando _START_ de _TOTAL_ Pacientes",
            "lengthMenu" : "Mostrar _MENU_ Pacientes",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection
