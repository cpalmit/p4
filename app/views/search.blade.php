@extends("master")

@section("title")
	Social Media Directory home
@stop

@section("content")
	<h2>All Accounts</h2>
	
	
	{{ Form::open(['url' => url('/index'), 'class' => 'navbar-form navbar-left', 'role'=> 'form']) }}
		<a href="{{ action('AccountController@getCreate') }}" class="btn btn-default">Add account</a>
	
		<div class="form-group">
			{{ Form::text('query', null, ['class'=>'form-control' , 'role'=>'search']) }} 
		</div>
		
		<div class="form-group">	
			{{ Form::submit('Search', ['class'=>'btn btn-default'] ) }}
		</div>
		
	{{ Form::close() }}
	

	
	

@stop