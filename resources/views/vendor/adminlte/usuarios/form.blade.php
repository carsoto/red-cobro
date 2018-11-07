
{{ Form::label('name', 'Nombre completo') }}
{!! Form::text('name', $usuario->name, array('class' => 'form-control', 'placeholder' => 'Introduce tu nombre y apellido')) !!}
<br>
{{ Form::label('email', 'Dirección de correo electrónico') }}
{!! Form::text('email', $usuario->e_mail, array('class' => 'form-control', 'placeholder' => 'Introduce tu correo')) !!}        
<br>
{{ Form::label('password', 'Contraseña') }}
{!!  Form::password('password', array('class' => 'form-control')) !!} 
<br>
{{ Form::label('password_confirmation', 'Confirmar contraseña') }} 
{!! Form::password('password_confirmation', array('class' => 'form-control')) !!} 
<br>
{{ Form::label('role', 'Perfil') }}
{!! Form::select('role', $roles, null, array('class' => 'form-control')) !!}
<br>
{{ Form::label('status', 'Estado') }}
{!! Form::select('status', $status, $usuario->status, array('class' => 'form-control')) !!}