@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

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
                            <td>{{ $pacient->name}} </td>
                            <td>{{ $pacient->ci }}</td>
                            <td>{{ $pacient->contact["phone_1"] }}</td>
                            <td>{{ $pacient->contact["phone_2"] }}</td>
                            <td>{{ $pacient->contact["address"] }}</td>
                            <td>
                                @if($pacient->sex === 'M')
                                    {{ "Masculino" }}
                                @else
                                    {{ "Femenino" }}
                                @endif
                            </td>
                            <td>{{ $pacient->contact["email"] }}</td>
                            <td>
                              <a href="#" id="ver"><i class="glyphicon glyphicon-eye-open"></i></a> 
                              <a href="{{ url('/admin/pacient', [$pacient->idPacient]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Esta Seguro?"><i class="glyphicon glyphicon-trash"></i></a>
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
      $('#data').DataTable();
    });
  </script>
  
@endsection



