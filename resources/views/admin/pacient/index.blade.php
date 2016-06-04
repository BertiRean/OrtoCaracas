@extends('admin.template.main')

@section('container')
<div id="wrapper">
  <div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      {{ Html::link('/admin/pacient/create', $button_create, ['class' => 'btn btn-success']) }}
      {{ Html::link('/admin/pacient/delete', $button_delete, ['class' => 'btn btn-danger']) }}


      <!-- Table of Data -->
      <div class="row">
          <div class="col-lg-12">
              <h2>{{ $title_table }}</h2>

              <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                        @foreach($model_labels as $table_label)
                            <th>{{$table_label}}</th>
                        @endforeach
                    </thead>

                    <tbody>
                        @foreach($pacients as $pacient)
                          <tr>
                            <td>{{ $pacient->name_pacient}} </td>
                            <td>{{ $pacient->ci_pacient }}</td>
                            <td>{{ $pacient->phone_pacient }}</td>
                            <td>
                                @if($pacient->sex === 'M')
                                    {{ "Masculino" }}
                                @else
                                    {{ "Femenino" }}
                                @endif
                            </td>
                            <td>{{ $pacient->birth_date }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection


