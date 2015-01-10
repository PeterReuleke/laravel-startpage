@extends('layouts.default')

@section('content')
	<h1>Login</h1>
	{{ Form::open(['route' => 'sessions.store']) }}
		<div>
			{{ Form::label('email', 'E-Mail:') }}
			{{ Form::text('email') }}
		</div>
		<div>
			{{ Form::label('password', 'Passwort:') }}
			{{ Form::password('password') }}
		</div>	
		<div>
			{{ Form::submit('Anmelden') }}
		</div>
	{{ Form::close() }}
@stop
