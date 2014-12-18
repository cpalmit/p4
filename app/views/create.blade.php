@extends("master")

@section("title")
	Add Account
@stop

@section("content")

	<h2>Add an Account</h2>
	

	{{ Form::open(['url' => url('/create'), 'class' => 'form-horizontal', 'role'=> 'form']) }}	
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, ['class'=>'form-control', 'required']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('website', 'Website') }}
		{{ Form::text('website', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('facebook', 'Facebook') }}
		{{ Form::text('facebook', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('twitter', 'Twitter') }}
		{{ Form::text('twitter', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('instagram', 'Instagram') }}
		{{ Form::text('instagram', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('youtube', 'YouTube') }}
		{{ Form::text('youtube', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('tumblr', 'Tumblr') }}
		{{ Form::text('tumblr', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('flickr', 'Flickr') }}
		{{ Form::text('flickr', null, ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}
	</div>
	
	<div class="form-group">	
		{{ Form::submit('Add', ['class'=>'btn btn-default'] ) }}
	</div>
	
	{{ Form::close() }}
	
@stop