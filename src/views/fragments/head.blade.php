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

	@section( 'styles' )
		@if(App::environment() === 'production')
			{{ HTML::style('packages/tlr/l4-cms/css/admin.min.css') }}
		@else
			{{ HTML::style('packages/tlr/l4-cms/css/admin.css') }}
		@endif
	@show
</head>
