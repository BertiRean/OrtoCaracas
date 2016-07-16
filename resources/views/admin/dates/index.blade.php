@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      

      {{ Html::link('/admin/find_pacient_date', $button_create, ['class' => 'btn btn-success']) }}
      {{ Html::link('#', $button_delete, ['class' => 'btn btn-danger', 'id' => 'delete']) }}

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
                        @foreach($dates as $date)
                          <tr>
                            <td>{{$date->doctor["name"] . " - " . $date->doctor->specs[0]['name']}}</td>
                            <td>{{$date->pacient["name"]}}</td>
                            <td>{{$date->date_consult->format('d/m/Y')}}</td>
                            <td>
                              {!! link_to_route('admin.dates.edit', $title = 'Editar', $parameters = $date->date_id, $attributes = ['class' => 'btn btn-primary']) !!}
                              <a href="{{ url('/admin/dates', [$date->date_id]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?" class="btn btn-danger">Eliminar</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {!! $dates->render() !!}
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
            "emptyTable": "No Hay Citas Registradas",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Citas Totales",
            "info": "Mostrando _START_ de _TOTAL_ Citas",
            "lengthMenu" : "Mostrar _MENU_ Citas",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



