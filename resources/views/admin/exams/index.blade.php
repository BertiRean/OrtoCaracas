@extends('admin.template.main')

@section('title', 'Inicio - Examenes')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      
      {!! link_to_route('admin.find.pacient.exam', $button_create, ['id' => $department], $attributes = ['class' => 'btn btn-success'])  !!}
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
                        @foreach($exams as $exam)
                          <tr>
                            <td>{{ $exam->pacient["name"] }}</td>
                            <td>{{ $exam->pacient['ci']   }}</td>
                            <td>{{ $exam->date_exam->format('d/m/Y') }}</td>
                            <td>{{ $exam->description }}</td>
                            <td>{{ $exam->amount }}</td>
                            <td>{{ $exam->personal}}</td>
                            <td>
                              <a href="{{ url('/admin/exams', [$exam->id_exam]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?" class="btn btn-danger">Eliminar</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {!! $exams->render() !!}
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
            "emptyTable": "No Hay Examenes Realizados",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Examenes Realizados",
            "info": "Mostrando _START_ de _TOTAL_ Examenes",
            "lengthMenu" : "Mostrar _MENU_ Examenes",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



