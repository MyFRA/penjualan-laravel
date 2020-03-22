<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    "Selamat Datang"
  </title>
  <style type="text/css">
	* {
		box-sizing: border-box;
		font-family: 'Helvetica';
		margin: 0;
		padding: 0;
	}
  	body {
  		background: url('{{ asset('/welcomes/landing.png') }}');
  		background-repeat: no-repeat;
  		background-size: 100%;
  		background-position: center center;
  		height: 100vh;
  	}

	.nav {
		overflow: hidden;
		background-color: #3F3D56;
		padding-bottom: 10px;
	}
	.nav a {
		float: right;
		margin-top: 10px;
		text-decoration: none;
		margin-right: 2%;
		color: #CACACA;
		font-size: 16px;
		padding: 10px 16px;
	}

	.nav a:nth-child(1) {
		border: 2px solid #CACACA;
		border-radius: 5px;
		padding: 10px 16px;
	}
	.nav a:nth-child(1):hover {
		transition: 300ms;
		border: 2px solid white;
	}
	.nav a:hover {
		transition: 300ms;
		color: white;
	}
	
  	@media screen and (min-width: 768px) {
		body {
			background-size: cover;
			background-position: top center;
		}
		.nav a { 
			font-size: 19px;
		}
	}
  </style>
</head>
<body>
	<div class="nav">
		<a href="{{ url('/register') }}">Daftar</a>
		<a href="{{ url('/login') }}">Masuk</a>
		<a style="float:left;display: inline-block;" href="">MyFRA</a>
	</div>
</body>
</html>