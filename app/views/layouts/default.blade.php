<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="my personal startpage">
		<meta name="author" content="Peter Reuleke">
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">	
		<title>Startpage on OpenShift</title>
  	  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		{{ HTML::style('assets/css/style.css') }}		
	</head>
	<body>
	
		@include('layouts.menu')
	
		<div id="content">	
		
		@include('box.box')			
			
		</div>
		
		{{ HTML::script('/assets/js/MooTools-Core-1.5.1.js') }}
		{{ HTML::script('/assets/js/MooTools-More-1.5.1.js') }}
		{{ HTML::script('/assets/js/function.js') }}
	</body>
</html>