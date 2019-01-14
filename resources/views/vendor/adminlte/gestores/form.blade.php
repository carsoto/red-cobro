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

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::text('rut_dv', $gestor->rut_dv, array('class' => 'form-control', 'placeholder' => 'RUT')) !!}
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::text('razon_social', $gestor->razon_social, array('class' => 'form-control', 'placeholder' => 'Razón Social')) !!}
</div>

<div class="row">
    <div class="col-xs-12">
        <a href="{!! route('gestores.index') !!}" class="btn btn-danger btn-flat">Cancelar</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']) !!}
    </div>
</div>