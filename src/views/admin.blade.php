<!DOCTYPE html>
<html>

	@include( 'l4-cms::fragments.head' )

	<body>
		@include( 'l4-cms::fragments.header' )

		@yield('content')

		@include( 'l4-cms::fragments.footer' )

		@include( 'l4-cms::fragments.foot' )
	</body>
</html>
