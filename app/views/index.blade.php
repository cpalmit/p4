@extends("master")

@section("title")
	Social Media Directory home
@stop

@section("content")
	<div class="row">
	{{ Form::open(['url' => url('/'), 'class' => 'navbar-form navbar-left', 'role'=> 'form']) }}
		<a href="{{ action('AccountController@getCreate') }}" class="btn btn-primary">Add account</a>
		<a href="{{ action('AccountController@getSelect') }}" class="btn btn-primary">Edit account</a>
		
		<div class="form-group">
			{{ Form::text('query', null, ['class'=>'form-control' , 'role'=>'search']) }} 
		</div>
		
		<div class="form-group">	
			{{ Form::submit('Search', ['class'=>'btn btn-primary'] ) }}
		</div>
		<a href="{{ action('AccountController@getIndex') }}" class="btn btn-primary">Clear search results</a>
		
	{{ Form::close() }}
	</div> <!--./row-->
	
	
	@if(isset($query))
		<h2>You searched for {{{ $query }}}</h2>
	@else
		<h2>All Accounts</h2>
	@endif
	
	
	<table id="list" class="table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Website</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>YouTube</th>
                <th>Tumblr</th>
                <th>Flickr</th>
            </tr>
        </thead>
        <tbody>
    	@foreach($accounts as $account)
		<tr>
			<td>{{{ $account->name }}}</td>
			<td><a href=" {{{ $account->website }}}" target="_blank" /> <img src="images/website.png" height="30" width="30" /></a></td>
			<td><a href=" {{{ $account->facebook }}}" target="_blank" /> <img src="images/facebook.png" height="30" width="30" /></a></td>
			<td><a href=" {{{ $account->twitter }}}" target="_blank" /> <img src="images/twitter.png" height="30" width="30" /></a></td>
			<td><a href=" {{{ $account->instagram }}}" target="_blank" /> <img src="images/instagram.png" height="30" width="30" /></a></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
        </tbody>
    </table>

@stop