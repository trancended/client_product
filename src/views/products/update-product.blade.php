@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product/update')}}" method="POST" role="form">
		{{csrf_field()}}

		{{method_field('PUT')}}

		<legend>Update a Product</legend>

		<input type="hidden" name="id" class="form-control" value="{{$product['id']}}">
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" value="{{$product['name']}}" required>
		</div>

		<div class="form-group">
			<label for="">Amount</label>
			<input type="text" class="form-control" name="amount" value="{{$product['amount']}}" required>
		</div>
	
		<button type="submit" class="btn btn-primary">Update Product</button>
	</form>
@endsection