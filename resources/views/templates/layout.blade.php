<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.css')}}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		header, main, footer {
	      padding-left: 300px;
	    }

	    @media only screen and (max-width : 992px) {
	      header, main, footer {
	        padding-left: 0;
	      }
	    }
	</style>
	@section('css')

	@show
</head>
<body>
	<header>
		@section('header')
			@include('templates.header')
			@include('templates.sidenav')
		@show
	</header>
	<main>
		<div style="margin-left: 30px;">
			@yield('content')
		</div>
	</main>


	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav(); 
		// $('.collapsible').collapsible();
		
	</script>
	@section('js')

	@show
</body>
</html>