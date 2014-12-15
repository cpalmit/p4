@extends("master")

@section("title")
	Add Account
@stop

@section("content")
	<h2>Add an Account</h2>
	
<!--	<form method='GET' action='/list'>
		<label for='query'>Search: </label>
		<input type='text' name='query' id='query'>
		<input type='submit' value='Search'>
	</form>
-->
Add an account to the directory.
	{{ Form::open(array('url' => '/create', 'method' => 'GET')); }}	
	
		{{ Form::label('name', 'Name'); }}
		{{ Form::text('name'); }} 
		<br>
		{{ Form::label('website', 'Website'); }}
		{{ Form::text('website'); }} 
		<br>
		{{ Form::label('facebook', 'Facebook'); }}
		{{ Form::text('facebook'); }} 
		<br>
		{{ Form::label('twitter', 'Twitter'); }}
		{{ Form::text('twitter'); }} 
		<br>
		{{ Form::label('instagram', 'Instagram'); }}
		{{ Form::text('instagram'); }} 
		<br>
		{{ Form::label('youtube', 'YouTube'); }}
		{{ Form::text('youtube'); }} 
		<br>
		{{ Form::label('tumblr', 'Tumblr'); }}
		{{ Form::text('tumblr'); }} 
		<br>
		{{ Form::label('flickr', 'Flickr'); }}
		{{ Form::text('flickr'); }} 
		<br>
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $categories); }}
		<br>
		
		{{ Form::submit('Add'); }}
	
	{{ Form::close() }}
	
	
@stop