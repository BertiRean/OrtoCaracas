<div id="wrapper">
        <div id="page-wrapper">

            <div class="container-fluid">
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
                            <li>
                                <i class= "{{$icon_class}}"></i> {{ $title_label }}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End of Heading -->

                <!-- Form of Create Model -->
                
                {!! Form::model($item, array('route' => array('items.create', $item->ci))) !!}


                {!! Form::close() !!}

            </div>
        </div>
</div>