@extends("master")

@section("title")
	Add Account
@stop

@section("content")
	<h2>Add an Account</h2>
	
Add an account to the directory.
	{{ Form::open(array('url' => '/create')); }}	
	
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name',Input::old('name')) }} 
		<br>
		{{ Form::label('website', 'Website') }}
		{{ Form::text('website') }} 
		<br>
		{{ Form::label('facebook', 'Facebook') }}
		{{ Form::text('facebook') }} 
		<br>
		{{ Form::label('twitter', 'Twitter') }}
		{{ Form::text('twitter') }} 
		<br>
		{{ Form::label('instagram', 'Instagram') }}
		{{ Form::text('instagram') }} 
		<br>
		{{ Form::label('youtube', 'YouTube') }}
		{{ Form::text('youtube') }} 
		<br>
		{{ Form::label('tumblr', 'Tumblr') }}
		{{ Form::text('tumblr') }} 
		<br>
		{{ Form::label('flickr', 'Flickr') }}
		{{ Form::text('flickr') }} 
		<br>
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $categories) }}
		<br>
		
		{{ Form::submit('Add') }}
	
	{{ Form::close() }}
	
@stop