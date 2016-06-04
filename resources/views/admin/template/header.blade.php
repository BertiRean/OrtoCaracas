<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                {!! Html::link('index.html' , 'Panel de Administracion', array('class' => 'navbar-brand')) !!}
            
            </div>
            <!-- Top Menu Items -->

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>



            <div class="collapse navbar-collapse navbar-ex1-collapse">
                

                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/admin"><i class="fa fa-fw fa fa-home"></i> Inicio</a>
                    </li>
                      <li>
                        <a href="/admin/pacient"><i class="fa fa-fw fa fa-user"></i> Pacientes</a>
                    </li>
                    <li>
                        <a href="/"><i class="fa fa-fw fa fa-calendar"></i> Citas</a>
                    </li>
                    <li>
                        <a href="/admin/doctor"><i class="fa fa-fw fa fa-user-md"></i> Doctores</a>
                    </li>
                    <li>
                        <a href="/"><i class="fa fa-fw fa fa-file-text"></i> Examenes</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
      </nav>