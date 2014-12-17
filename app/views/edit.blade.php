@extends("master")

@section("title")
	Edit Account
@stop

@section("content")
	<h2>Edit account for {{$account['name'] }} </h2>
	
	{{ Form::open(['url' => url('/edit'), 'class' => 'form-horizontal', 'role'=> 'form'])  }}
		
		{{ Form::hidden('id',$account['id']); }}
		
		<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $account['name'], ['class'=>'form-control']) }}
		</div>
	
	<div class="form-group">	
		{{ Form::label('website', 'Website') }}
		{{ Form::text('website', $account['website'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('facebook', 'Facebook') }}
		{{ Form::text('facebook', $account['facebook'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('twitter', 'Twitter') }}
		{{ Form::text('twitter', $account['twitter'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('instagram', 'Instagram') }}
		{{ Form::text('instagram', $account['instagram'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('youtube', 'YouTube') }}
		{{ Form::text('youtube', $account['youtube'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('tumblr', 'Tumblr') }}
		{{ Form::text('tumblr', $account['tumblr'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('flickr', 'Flickr') }}
		{{ Form::text('flickr', $account['flickr'], ['class'=>'form-control']) }} 
	</div>
	
	<div class="form-group">	
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $categories, $account['category_id'], ['class'=>'form-control']) }}
	</div>
		
		{{ Form::submit('Update',['class'=>'btn btn-default']) }}
		
	{{ Form::close() }}
	
	
	{{ Form::open(array('url' => '/delete')) }}
		{{ Form::hidden('id',$account['id']) }}
		<button onClick='parentNode.submit();return false;' class="btn btn-default">Delete</button>
	{{ Form::close() }}

@stop