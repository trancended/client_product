@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Input the Product Id</legend>
	
		<div class="form-group">
			<label for="">Product Id</label>
			<input type="number" class="form-control" placeholder="The product Id" name="productId" required value="{{old('productId')}}">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Show Product</button>
	</form>
@endsection