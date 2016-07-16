@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      

      {{ Html::link('/admin/pacient/create', $button_create, ['class' => 'btn btn-success']) }}
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
                        @foreach($pacients as $pacient)
                          <tr data-id = "{{ $pacient->id_pacient }}">
                            <td>{{Html::linkRoute('admin.consults.view_pacient', $pacient->name, ['id' => $pacient->id_pacient]) }}</td>
                            <td>{{ $pacient->ci }}</td>

                            <!-- Show Phones -->
                            @foreach($pacient->phones as $phone)

                              <td>{{ $phone["phone_number"]}}</td>

                            @endforeach
                            <!-- End of Shows -->
                            <td>{{ $pacient->contact["address"] }}</td>
                            <td>
                                @if($pacient->sex === 'M')
                                    {{ "Masculino" }}
                                @else
                                    {{ "Femenino" }}
                                @endif
                            </td>
                            <td>{{ $pacient->contact["email"] }}</td>
                            <td>{{ $pacient->birth_date->format('d-m-Y') }}</td>
                            <td>
                                @if($pacient->is_birthday())
                                  {{"El paciente esta de cumpleaños"}}
                                @endif

                            </td>
                            <td>
                              {!! link_to_route('admin.pacient.edit', $title = 'Editar', $parameters = $pacient->id_pacient, $attributes = ['class' => 'btn btn-primary']) !!}
                              <a href="{{ url('/admin/pacient', [$pacient->id_pacient]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?" class="btn btn-danger">Eliminar</a>
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



