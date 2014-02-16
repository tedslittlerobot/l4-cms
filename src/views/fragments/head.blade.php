<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		@unless( App::environment() === 'production' )
			::{{ App::environment() }}::
		@endunless
		{{{ $title or 'Velox CMS' }}}
	</title>

	@section('meta')
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@if( isset($meta) )
			@foreach( $meta as $name => $content )
				<meta name="{{{ $name }}}" content="{{{ $content }}}">
			@endforeach
		@endif
	@show

	<link rel="stylesheet" href="//cdn.jsdelivr.net/gumby/2.5.11/css/gumby.css">

	@section( 'styles' )
		{{-- styles --}}
	@show
</head>
