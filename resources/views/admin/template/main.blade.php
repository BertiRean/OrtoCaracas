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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>

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

    <!-- Additional Scripts -->


    <!-- jQueryUi Theme -->
    {!! Html::style('assets/js/ui/jquery-ui.css') !!}
    <!-- Bootstrap Core JavaScript -->

    <!-- Morris Charts JavaScript -->

    {!! Html::script('assets/admin/js/plugins/morris/raphael.min.js',['type' => 'text/javascript']) !!}

    <script src="/assets/js/laravel.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.js"></script>

    @yield('scripts')

  </body>
</html>