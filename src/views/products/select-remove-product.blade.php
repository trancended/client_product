@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product/remove')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Select the Product</legend>
	
		<div class="form-group">
			<label for="">Product Id</label>
			<select name="productId" class="form-control" required="required">
				<option>Select a Product</option>
				@foreach($products as $product)
				<option value="{{$product['id']}}">{{$product['name']}}</option>
				@endforeach
			</select>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Remove Product</button>
	</form>
@endsection