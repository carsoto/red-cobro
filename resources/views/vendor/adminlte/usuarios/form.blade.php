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
    {!! Form::text('name', $usuario->name, array('class' => 'form-control', 'placeholder' => trans('adminlte_lang::message.name'))) !!}
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::text('lastname', $usuario->lastname, array('class' => 'form-control', 'placeholder' => trans('adminlte_lang::message.lastname'))) !!}
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::text('username', $usuario->username, array('class' => 'form-control', 'placeholder' => 'RUT')) !!}
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::text('email', $usuario->e_mail, array('class' => 'form-control', 'placeholder' => trans('adminlte_lang::message.email'))) !!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!!  Form::password('password', array('class' => 'form-control', 'placeholder' => trans('adminlte_lang::message.password'))) !!} 
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => trans('adminlte_lang::message.retrypepassword'))) !!} 
</div>

@if((Auth::user()->hasRole('superadmin')) || (Auth::user()->hasRole('admin')))
    <div class="form-group col-lg-6 col-md-6 col-sm-6">
        {{ Form::label('role', 'Perfil') }}
        @if($usuario->role != NULL)
            @foreach($roles AS $key => $role)
                @if($role == $usuario->role->name)
                    <div class="iradio icheck">
                        <label>
                            <input value="{{ $key }}" type="radio" name="role" checked> {{ ucfirst($role) }}
                        </label>
                    </div>
                @else
                    <div class="iradio icheck">
                        <label>
                            <input value="{{ $key }}" type="radio" name="role"> {{ ucfirst($role) }}
                        </label>
                    </div> 
                @endif
            @endforeach
        @else
            @foreach($roles AS $key => $role)
                @if($role == 'superadmin')
                    <div class="iradio icheck">
                        <label>
                            <input value="{{ $key }}" type="radio" name="role"> {{ ucfirst($role) }}
                        </label>
                    </div> 
                @else
                    @if($role != 'superadmin')
                        <div class="iradio icheck">
                            <label>
                                <input value="{{ $key }}" type="radio" name="role"> {{ ucfirst($role) }}
                            </label>
                        </div>
                    @endif
                @endif
            @endforeach
        @endif
    </div>
@endif

<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {{ Form::label('status', 'Estado') }}
    {!! Form::select('status', $status, $usuario->status, array('class' => 'form-control')) !!}
</div>
<div class="form-group col-lg-6 col-md-6 col-sm-6">
    {{ Form::label('gestor', 'Gestor') }}
    
    @if($usuario->gestor != NULL)
        {!! Form::select('gestor', $gestores, $usuario->gestor->idgestores, array('class' => 'form-control')) !!}
    @else
        {!! Form::select('gestor', $gestores, 1, array('class' => 'form-control')) !!}
    @endif
</div>

<div class="row">
    <div class="col-xs-12">
        <a href="{!! route('usuarios.index') !!}" class="btn btn-danger btn-flat">Cancelar</a>
        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']) !!}
    </div>
</div>