<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="{{asset('templateapi/css/style.css')}}">
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap"
			rel="stylesheet"
		/>

		<title>Projeto Pró Catador</title>
	</head>

	<body class="">

        @yield('conteudo-principal')

        <script src="{{asset('templateapi/js/script.js')}}"></script>
	</body>
</html>
