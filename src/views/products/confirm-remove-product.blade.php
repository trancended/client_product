@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product/remove')}}" method="POST" role="form">
		{{csrf_field()}}

		{{method_field('DELETE')}}

		<legend>Delete a Product</legend>

		<p>Please confirm the deletion of this product</p>

		<input type="hidden" name="id" class="form-control" value="{{$product['id']}}">
	
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" value="{{$product['name']}}" required disabled>
		</div>

		<div class="form-group">
			<label for="">Amount</label>
			<input type="text" class="form-control" name="amount" value="{{$product['amount']}}" required disabled>
		</div>

		<button type="submit" class="btn btn-primary">Remove Product</button>
	</form>
@endsection