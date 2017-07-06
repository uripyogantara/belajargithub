<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.css')}}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	@section('css')

	@show
</head>
<body>
	<header>
		@section('header')
			@include('templates.header')
		@show
	</header>
	<main>
		<div style="margin-left: 30px;">
			@yield('content')
		</div>
	</main>


	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
	
	@section('js')

	@show
</body>
</html>