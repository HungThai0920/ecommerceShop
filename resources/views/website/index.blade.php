<!DOCTYPE html>
<html lang="en">

<head>
	@include('website.template.head')
</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			@include('website.template.top-header')
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			@include('website.template.header')
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav @yield('show') ">
					@include('website.template.navigation')
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					@include('website.template.menu')
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	@yield('content')

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
			@include('website.template.footer')
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	@include('website.template.javascript')

</body>

</html>
