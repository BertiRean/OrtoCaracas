@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      

      {{ Html::link('/admin/doctor/create', $button_create, ['class' => 'btn btn-success']) }}
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
                        @foreach($doctors as $doctor)
                          <tr>
                            <td>{{Html::linkRoute('admin.consults.view_doctor', $doctor->name, ['id' => $doctor->id_doctor]) }}</td>
                            <td>{{ $doctor->ci }}</td>

                            <!-- Show Phones -->
                            @foreach($doctor->specs as $spec)

                              <td>{{ $spec["name"]}}</td>

                            @endforeach

                            @foreach($doctor->phones as $phone)
                              <td>{{ $phone["phone_number"] }}</td>
                            @endforeach
                            <!-- End of Shows -->
                            <td>
                              {{ $doctor->contact["address"] }}
                            </td>
                            <td>{{ $doctor->bank_account }}</td>
                            <td>{{ $doctor->contact["email"]}} </td>
                            <td>
                              {!! link_to_route('admin.doctor.edit', $title = 'Editar', $parameters = $doctor->id_doctor, $attributes = ['class' => 'btn btn-primary']) !!}
                              <a href="{{ url('/admin/doctor', [$doctor->id_doctor]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?" class="btn btn-danger">Eliminar</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                  {!! $doctors->render() !!}
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
            "emptyTable": "No Hay Doctores Registrados",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Doctores Totales",
            "info": "Mostrando _START_ de _TOTAL_ Doctores",
            "lengthMenu" : "Mostrar _MENU_ Doctores",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



