@extends('l4-cms::layout')

@section('header')
	@section('header-nav')
		<nav class="navbar" role="navigation">
			<h1 class="four columns logo">
				<a href="{{ route('admin') }}">
					{{ $title or 'Velox' }}
				</a>
			</h1>
			{{ Menu::menu('admin-header-nav')->render() }}
		</nav>
	@show
	@yield('breadcrumbs')
@stop
