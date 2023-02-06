<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		@include('admin.template.header')
	</head>
	<body class="hold-transition skin-blue fixed sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<header class="main-header">
				@include('admin.template.top')
			</header>
			
			<aside class="main-sidebar">
				@include('admin.template.sidebar')
			</aside>
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				{{--  @include('admin.template.content-header')  --}}

				<!-- Main content -->
				<section class="content">
					@yield('content')
				</section>
			</div>
			<footer class="main-footer">
			@include('admin.template.footer')
			</footer>
  			<div class="control-sidebar-bg"></div>
		</div>
		@include('admin.template.javaScript')
	</body>
</html>
