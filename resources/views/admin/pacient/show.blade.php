@extends('admin.template.main')

@section('container')

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Body Heading -->
      @include('admin.template.body-header', ['icons' => $icons])
      <!-- End of Body Heading -->

      <div class="row">
        <div class="col-lg-6">
          
        {!! Form::token() !!}
         
        {!! Form::model($pacient, ['route' => ]) !!}

        </div>
        
      </div>
  </div>
</div>
@endsection()