@extends("master")

@section("title")
	Social Media Directory home
@stop

@section("content")
	<h2>All Accounts</h2>
	
	<a href="{{ action('AccountController@getCreate') }}" class="btn btn-primary">Add account</a>
	
	
@stop