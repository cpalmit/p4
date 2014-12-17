@extends("master")

@section("title")
	Edit Account
@stop

@section("content")
	<h2>Edit {{$account['name'] }} </h2>
	
	{{ Form::open(array('url' => '/edit')); }}
		
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $account['name']) }}
		<br>
		{{ Form::label('website', 'Website') }}
		{{ Form::text('website', $account['website']) }} 
		<br>
		{{ Form::label('facebook', 'Facebook') }}
		{{ Form::text('facebook', $account['facebook']) }} 
		<br>
		{{ Form::label('twitter', 'Twitter') }}
		{{ Form::text('twitter', $account['twitter']) }} 
		<br>
		{{ Form::label('instagram', 'Instagram') }}
		{{ Form::text('instagram', $account['instagram']) }} 
		<br>
		{{ Form::label('youtube', 'YouTube') }}
		{{ Form::text('youtube', $account['youtube']) }} 
		<br>
		{{ Form::label('tumblr', 'Tumblr') }}
		{{ Form::text('tumblr', $account['tumblr']) }} 
		<br>
		{{ Form::label('flickr', 'Flickr') }}
		{{ Form::text('flickr', $account['flickr']) }} 
		<br>
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $categories, $account['category_id']) }}
		<br>
		
		{{ Form::submit('Update'); }}
		
	{{ Form::close() }}
	
	
	{{ Form::open(array('url' => '/delete')) }}
		<button onClick='parentNode.submit();return false;'>Delete</button>
	{{ Form::close() }}

@stop