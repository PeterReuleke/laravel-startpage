@extends('layouts.default')

@section('content')
	<h1>Create new User</h1>
	{{ Form::open(['route' => 'users.store']) }}
		<div>
			{{ Form::label('name', 'Username:') }}
			{{ Form::text('name') }}
			{{ $errors->first('name') }}
		</div>
		<div>
			{{ Form::label('email', 'E-Mail:') }}
			{{ Form::text('email') }}
			{{ $errors->first('email') }}
		</div>
		<div>
			{{ Form::label('password', 'Passwort:') }}
			{{ Form::password('password') }}
			{{ $errors->first('password') }}
		</div>	
		<div>
			{{ Form::submit('User hinzufügen') }}
		</div>
	{{ Form::close() }}
@stop
