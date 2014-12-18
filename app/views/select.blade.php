@extends("master")

@section("title")
	Social Media Directory home
@stop

@section("content")
	
	
	<p>Select the account you want to edit.</p>
	{{ Form::open(['url' => url('/select'), 'class' => 'form-horizontal', 'role'=> 'form'])  }}
	
	<div class="form-group">
		{{ Form::label('account_id', 'Accounts') }}
		{{ Form::select('account', $accounts, null, ['class'=>'form-control']) }}
	</div>
	
	{{ Form::submit('Select',['class'=>'btn btn-default']) }}
	{{ Form::close() }}

	
	

@stop