@extends("master")

@section("title")
	Social Media Directory home
@stop

@section("content")
	<h2>All Accounts</h2>
	
	<a href="{{ action('AccountController@getCreate') }}" class="btn btn-primary">Add account</a>
	
	<table id="list" class="display" cellspacing="0" width="100%">
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
			<td><a href=" {{{ $account->website }}}" /> <img src="images/website.png" height="30" width="30" /></a></td>
			<td><a href=" {{{ $account->facebook }}}" /> <img src="images/facebook.png" height="30" width="30" /></a></td>
			<td><a href=" {{{ $account->twitter }}}" /> <img src="images/twitter.png" height="30" width="30" /></a></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
        </tbody>
    </table>
	
	

@stop