@extends('admin.template.main')

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
                        @foreach($earnings as $earning)
                          <tr>
                            <td>{{$earning->date->format('d/m/Y')}}</td>
                            <td>{{$earning->mount}}</td>
                            @if($earning->department_id != 0)
                              <td>{{$earning->department[0]['name']}}</td>
                            @else
                              <td>{{Html::linkRoute('admin.consults.view_doctor', $earning->doctor->name . ' - ' . 
                              $earning->doctor->specs[0]['name'], ['id' => $earning->doctor->id_doctor]) }}</td>
                            @endif
                          </tr>

                        @endforeach
                    </tbody>
                  </table>

                  {!! $earnings->render() !!}
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
            "emptyTable": "No Hay Ingresos Registradas",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Ingresos Totales",
            "info": "Mostrando _START_ de _TOTAL_ Ingresos",
            "lengthMenu" : "Mostrar _MENU_ Ingresos",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



