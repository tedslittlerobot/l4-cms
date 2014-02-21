<!DOCTYPE html>
<html>

	@include( 'l4-cms::fragments.head' )

	<body>
		@include( 'l4-cms::fragments.header' )

		@section('body')
			@yield('content')
		@show

		@include( 'l4-cms::fragments.footer' )

		@include( 'l4-cms::fragments.foot' )
	</body>
</html>
