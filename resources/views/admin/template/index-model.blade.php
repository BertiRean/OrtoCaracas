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
                        </table>
                    </div>

                </div>
            </div>

            </div>
        </div>
</div>