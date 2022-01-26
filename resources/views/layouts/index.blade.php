<!DOCTYPE HTML>
<html>
	<head>
		<title>{{config('app.name','POSTS')}}</title>
		<meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('static/css/main.css')}}" />
	</head>
	<body class="is-preload">
		
	@include('layouts.navbar')
	
    @include('layouts.sidebar')	
	@include('messages')		
	<main class="py-4">
            @yield('content')
        </main>
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; 2021.</li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!-- <script src="assets/js/main.js"></script> -->
			<script src="{{asset('static/js/bootstrap.min.js')}}"></script>

            <script src="{{asset('static/js/main.js')}}"></script>


	</body>
</html>