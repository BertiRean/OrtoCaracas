@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      @include('flash::message')
      
      {{ Html::link('/admin/expenses/create', $button_create, ['class' => 'btn btn-success navbar-left']) }}
      <br>
      <br>
      <p>
        <h3>Total del Mes {{date('m/Y')}}:  {{$anual_mount}} Bs</h3>
      </p>

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
                    <?php $i = 0 ?>
                    <tbody>
                        @foreach($expenses as $expense)
                          <tr>
                            <td> {{ $expense->description }} </td>
                            <td> {{ $expense->bill_number }} </td>
                            <td> {{ $expense->amount }}</td>
                            <td> {{ $expense->date->format('d/m/Y') }}</td>
                            <td>
                              <a href="{{ url('/admin/expenses', [$expense->id_expense]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="¿Esta Seguro?" class="btn btn-danger">Eliminar</a>
                            </td>
                          </tr>

                        @endforeach
                    </tbody>
                  </table>

                  {!! $expenses->render() !!}
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
            "emptyTable": "No Hay Egresos Registrados",
            "paginate" : {
              "first": "Inicio",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultima"
            },
            "infoEmpty": "Mostrando 0 de 0 Egresos Totales",
            "info": "Mostrando _START_ de _TOTAL_ Egresos",
            "lengthMenu" : "Mostrar _MENU_ Egresos",
            "search": "Busqueda:",
            "zeroRecords":    "No se han encontrado resultados",
          }
        });
    });
  </script>
  
@endsection



