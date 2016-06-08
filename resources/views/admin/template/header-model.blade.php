<div class="col-lg-12">
          {{ Html::link('/admin/pacient/create', $button_create, ['class' => 'btn btn-success']) }}
          {{ Html::link('/admin/pacient/delete', $button_delete, ['class' => 'btn btn-danger']) }}

          {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])  !!}
 
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            
          {!! Form::close() !!}

</div>