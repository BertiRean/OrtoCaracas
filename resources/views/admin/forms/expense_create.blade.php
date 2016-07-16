{!! Form::open(['class' => 'form-horizontal', 'action' => 'ExpenseController@store', 'method' => 'POST']) !!}

    {!! Form::token() !!}

    <!-- Input Name -->
    {!! Form::label('description', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['placeholder' => 'Nombre del Egreso', 'class' => 'form-control'])!!}

    <!-- Input Ci -->
    {!! Form::label('bill_number', 'Numero de Factura', ['class' => 'control-label']) !!}
    {!! Form::text('bill_number', null, ['class' => 'form-control']) !!}

    <!-- Show Actual Date -->
    {!! Form::label('date_expense', 'Fecha', ['class' => 'control-label']) !!}
    {!! Form::text('date_expense', null, ['class' => 'form-control', 'id' => 'datepicker'])!!}

    <!-- Input Amount -->
    {!! Form::label('amount', 'Monto', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ['placeholder' => 'Coste de la factura', 'class' => 'form-control'])!!}


    <br>
{!! Form::submit('Registrar Egreso', ['class' => 'btn btn-primary'] ) !!}

            
{!! Form::close() !!}


