@extends('admin.template.main')

@section('container')

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
                        </ol>
                    </div>
                </div>
            <div class="row">
                <!-- Bloques de Seleccion -->

                {{-- Bloque de Pacientes --}}
                	<div class="col-lg-3 col-md-6">
                            <a href = "/admin/orto">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa fa-user-md fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="h4">Odontologia General</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a>
                    </div>

                {{-- Bloque de Pacientes --}}
                    <div class="col-lg-3 col-md-6">
                        <a href = "/admin/specs">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa fa-user-md fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h4">Especialistas</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                        </a>
                    </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href="/admin/rad-orto">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Radiografia Odontologia</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href="/admin/rad-med">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Radiologia Medica</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>    
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href = "/admin/mamography">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Mamografia</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left"></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    </a>
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href = "/admin/lab">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-flask fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Laboratorio Clinico</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href = "/admin/eco">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-bar-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Ecosonografía</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                

                {{-- Bloque de Doctores --}}
                <div class="col-lg-3 col-md-6">
                        <a href = "/admin/pacient">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h4">Pacientes</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                        </a>
                    </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href  = "/admin/dates">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Citas</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href="/admin/ingresos">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Ingresos</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                {{-- Bloque de Citas --}}
                <div class="col-lg-3 col-md-6">
                    <a href="/admin/egresos">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h4">Egresos</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                </a>
            </div> 

            </div>


    </div>

@endsection