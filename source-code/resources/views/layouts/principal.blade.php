<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>SABolsas</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#myBtn").click(function(){
				$("#myModal").modal();
			});
		});
	</script>
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<nav class="navbar navbar-light bg-faded colorPalets" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand navTitle" href="/">SABolsas</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if (Auth::guest())
				<li><a href="/student/list" class="navText">Listar Alunos</a></li>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle navText" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar<span class="caret"></span></a>
          				<ul class="dropdown-menu">
            				<li><a href="/student/list" class="navText">Listar Alunos</a></li>
                    		<li><a href="/admin/user/list" class="navText">Listar Avaliadores</a></li>
                    		<li><a href="/bolsa/list" class="navText">Listar Bolsas</a></li>
          				</ul>
        		</li>
              	<li><a href="/log" class="navText">Histórico de Bolsas</a></li>
              	<li class="dropdown">
          				<a href="#" class="dropdown-toggle navText" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro<span class="caret"></span></a>
          				<ul class="dropdown-menu">
            				<li><a href="/admin/user/add">Avaliador</a></li>
                    		<li><a href="/student/add">Aluno</a></li>
                    		<li><a href="/bolsa/add">Bolsa</a></li>
                    		<li><a href="/agencia/cadf">Agencia Fomentadora</a></li>
                    		<li><a href="/bolsa/calc">Regra de Calculo</a></li>
                    		<li><a href="/bolsa/apq">Area de Pesquisa</a></li>
          				</ul>
        			</li>
			</ul>
			@endif

			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
				<li><a href="{{ route('login') }}">Login</a></li>
				<!-- <li><a href="{{ route('register') }}">Register</a></li> -->
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ App\User::name(Auth::user()->professor_matricula) }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
			@endif
		</ul>
	</div>
</div>
</nav>
<body>
	<div class = "container">
		@yield('content')
	</div>
</body>
