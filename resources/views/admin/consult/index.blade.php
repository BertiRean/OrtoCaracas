@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      

      {{ Html::link('/admin/find_pacient_consult', $button_create, ['class' => 'btn btn-success']) }}
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
                        @foreach($consults as $consult)
                          <tr>
                            <td>{{ $consult->doctor["name"] . " - " . $consult->doctor->specs[0]['name']}}</td>
                            <td>{{ $consult->pacient["name"]}}</td>
                            <td>{{ $consult->pacient["ci"]}}</td>
                            <td>{{ $consult->date_consult->format('d/m/Y')}}</td>
                            <td>{{ $consult->description}}</td>
                            <td>{{ $consult->amount}}</td>
                            <td>
                              {!! link_to_route('admin.consults.edit', $title = 'Editar', $parameters = $consult->id_consult, $attributes = ['class' => 'btn btn-primary']) !!}
                              <a href="{{ url('/admin/consults', [$consult->id_consult]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?" class="btn btn-danger">Eliminar</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {!! $consults->render() !!}
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
            "emptyTable": "No Hay Consultas Registradas",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Consultas Totales",
            "info": "Mostrando _START_ de _TOTAL_ Consultas",
            "lengthMenu" : "Mostrar _MENU_ Consultas",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



