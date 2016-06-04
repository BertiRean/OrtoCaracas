<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap Core Css -->

    {!! Html::style('assets/css/bootstrap.min.css') !!}

    <!--  Css Style for Admin Panel -->
    {!! Html::style('assets/admin/css/sb-admin.css') !!}

    <!-- Morris Plugin -->

    {!! Html::style('assets/admin/css/plugins/morris.css') !!}

    <!-- Customs Fonts -->

    {!! Html::style('assets/admin/font-awesome/css/font-awesome.min.css') !!}

    <title>Ortodoncia Caracas - @yield('title', 'Inicio')</title> 


  </head>
  
  <body>

    {{-- Cabecera del Sitio --}}
    <!-- Navigation -->
    @include('admin.template.header')

    {{-- Cuerpo del Sitio --}}
      
    @yield('container')

    <!-- jQuery -->
    <script src = "{{ asset('/assets/js/jquery-2.2.4.js') }}"></script>
    <script src = "{{ asset('/assets/js/bootstrap.js') }}"></script>
    <script src = "{{ asset('/assets/js/ui/jquery-ui.js') }}"></script>

    <!-- jQueryUi Theme -->
    {!! Html::style('assets/js/ui/jquery-ui.css') !!}
    <!-- Bootstrap Core JavaScript -->

    <!-- Morris Charts JavaScript -->

    {!! Html::script('assets/admin/js/plugins/morris/raphael.min.js',['type' => 'text/javascript']) !!}
    {!! Html::script('assets/admin/js/plugins/morris/morris.min.js', ['type' => 'text/javascript'])  !!}
    {!! Html::script('assets/admin/js/plugins/morris/morris-data.js', ['type' => 'text/javascript']) !!}

    <script src="/assets/js/laravel.js"></script>

    <script src="{{asset('assets/plugins/datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('assets/plugins/datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/plugins/datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datePicker/css/bootstrap-datepicker3.standalone.css')}}">
    
    @yield('scripts')

  </body>
</html>