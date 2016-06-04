<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Bienvenido 
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-dashboard"></i> Inicio
      </li>
      @foreach($icons as $icon => $i_label)
        <li>
            <i class="{{ $icon }}"></i> {{ $i_label }}
        </li>
      @endforeach 
    </ol>
  </div>
</div>
