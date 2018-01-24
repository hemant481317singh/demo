<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		@include('layout.headerScript')
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			@include('layout.head')
			@include('layout.leftAside')
			@yield('content');
			@include('layout.footer')
			@include('layout.rightAside')
			<div class="control-sidebar-bg"></div>
		</div><!-- ./wrapper -->
		@include('layout.footerScript')
	</body>
</html>
