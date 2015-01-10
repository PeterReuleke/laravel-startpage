@extends('layouts.default')

@section('content')
	<p>Nutzer</p>
	
	@if ($users->count())
		@foreach ($users as $user)
			<li>{{ link_to( "/users/{$user->name}", $user->name  ) }}</li>
		@endforeach
	@else
		<p>keine Einträge.</p>
	@endif
	
	<p>{{ link_to( "/users/create", "Registieren" ) }}</p>
@stop