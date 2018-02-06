<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Client Product</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script type="text/javascript">$(document).ready(function() {
            $('select').material_select();
        });</script>
</head>
<body>

	<div class="nav-wrapper container">
	  <a href="{{url('/')}}"><h4>Client Product</h4></a>
	</div>

	@include('trancended-clientproduct::components.success')
	@include('trancended-clientproduct::components.errors')

	<div class="container">
		@yield('content')
	</div>
	
</body>
</html>