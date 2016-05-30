<!DOCTYPE html>
<html>
<head>


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

<body>

		{{-- Cabecera del Sitio --}}
		@include('admin.template.header')

		{{-- Cuerpo del Sitio --}}
			
		@yield('container')

    <!-- jQuery -->
    {!! Html::script('assets/admin/js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('assets/js/bootstrap.min.js') !!}

    <!-- Morris Charts JavaScript -->

    {!! Html::script('assets/admin/js/plugins/morris/raphael.min.js') !!}
    {!! Html::script('assets/admin/js/plugins/morris/morris.min.js')  !!}
    {!! Html::script('assets/admin/js/plugins/morris/morris-data.js') !!}


</body>
</html>