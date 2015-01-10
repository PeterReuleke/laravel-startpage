@extends('layouts.default')

@section('content')
	<p>Profil</p>
	<p>Name: {{ $user->name }}</p>
	<p>E-Mail: {{ $user->eamil }}</p>
@stop
