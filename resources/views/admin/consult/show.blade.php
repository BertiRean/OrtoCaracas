@extends('admin.template.main')

@section('tittle', 'Editar Consulta')


@section('container')

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Body Heading -->
      <?php $icons = ['fa fa-user' => 'Consulta', 'fa fa-plus-square-o' => 'Editar Consulta'] ?>

      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->
      <div class="row">
        <div class="col-lg-6">

          @include('admin.forms.consult_edit' ,$consult);

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  
  <script type="text/javascript">

      $.datepicker.regional['es'] = {
         closeText: 'Cerrar',
         prevText: '<Ant',
         nextText: 'Sig>',
         currentText: 'Hoy',
         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
         weekHeader: 'Sm',
         dateFormat: 'dd/mm/yy',
         firstDay: 1,
         isRTL: false,
         showMonthAfterYear: false,
         yearSuffix: ''
       };
      $.datepicker.setDefaults($.datepicker.regional['es']);
      
      $(function() 
      {
        $("#datepicker").datepicker(
          {
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy"
          });

      });

  </script>



@endsection



