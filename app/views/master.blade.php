<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield("title","Social Media Directory")</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">	
</head>
<body>
	<div class="container">
	
	@if(Session::get('flash_message'))
		<div class="flash-message alert alert-info" role="alert">{{ Session::get("flash_message") }}</div>
	@endif
	
	<h1>Wellesley College Social Media Directory</h1>
	

	@yield("content")
	</div>
</body>
</html>
