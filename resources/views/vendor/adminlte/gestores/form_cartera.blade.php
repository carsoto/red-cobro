@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

@if (Session::has('message-error'))
    <div class="alert alert-danger">{{ Session::get('message-error') }}</div>
@endif

<div class="form-group col-lg-4 col-md-4 col-sm-4">
    {!! Form::text('cartera', null, array('class' => 'form-control', 'placeholder' => 'Cartera')) !!}
</div>


<div class="row">
    <div class="col-xs-12">
        <a href="{!! route('gestores.index') !!}" class="btn btn-danger btn-flat">Cancelar</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']) !!}
    </div>
</div>