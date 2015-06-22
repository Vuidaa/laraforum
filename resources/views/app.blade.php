<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LaraForum</title>
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/site-styles.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" />
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class='container'>
			@include('nav')
			@yield('content')
		</div>
		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/site.js')}}"></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/js/bootstrap-select.min.js'></script>
	</body>
</html>