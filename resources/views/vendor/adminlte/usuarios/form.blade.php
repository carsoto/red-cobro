@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<div class="form-group col-sm-6">
	{{ Form::label('name', 'Nombre completo') }}
	{!! Form::text('name', $usuario->name, array('class' => 'form-control', 'placeholder' => 'Introduce tu nombre y apellido')) !!}
</div>

<div class="form-group col-sm-6">
	{{ Form::label('email', 'Dirección de correo electrónico') }}
	{!! Form::text('email', $usuario->e_mail, array('class' => 'form-control', 'placeholder' => 'Introduce tu correo')) !!}        
</div>

<div class="form-group col-sm-6">
	{{ Form::label('password', 'Contraseña') }}
	{!!  Form::password('password', array('class' => 'form-control')) !!} 
</div>

<div class="form-group col-sm-6">
	{{ Form::label('password_confirmation', 'Confirmar contraseña') }} 
	{!! Form::password('password_confirmation', array('class' => 'form-control')) !!} 
</div>

<div class="form-group col-sm-6">
	{{ Form::label('role', 'Perfil') }}
	@foreach($roles AS $key => $role)
		@if(count($usuario->roles) > 0)
			@foreach($usuario->roles AS $urole)
				@if($urole->name == $role)
					<div class="iradio icheck">
			        	<label>
			                <input value="{{ $role }}" type="radio" name="role" checked> {{ ucfirst($role) }}
			            </label>
			        </div>
				@else
					<div class="iradio icheck">
			        	<label>
			                <input value="{{ $role }}" type="radio" name="role"> {{ ucfirst($role) }}
			            </label>
			        </div>
				@endif
			@endforeach
		@else
			<div class="iradio icheck">
	        	<label>
	                <input value="{{ $role }}" type="radio" name="role"> {{ ucfirst($role) }}
	            </label>
	        </div>
		@endif
	@endforeach
</div>

<div class="form-group col-sm-6">
	{{ Form::label('status', 'Estado') }}
	{!! Form::select('status', $status, $usuario->status, array('class' => 'form-control')) !!}
</div>

<!-- Submit Field -->
<div class="col-sm-12 pull-right">
    <a href="{!! route('usuarios.index') !!}" class="btn btn-danger btn-flat">Cancelar</a>
    {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-flat']) !!}
</div>
