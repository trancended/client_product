@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product/create')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Create a Product</legend>
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" required>
		</div>

		<div class="form-group">
			<label for="">Amount</label>
			<input type="text" class="form-control" name="amount" required>
		</div>
	
		<button type="submit" class="btn btn-primary">Create Product</button>
	</form>
@endsection