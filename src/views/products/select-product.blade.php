@extends('trancended-clientproduct::layouts.master')

@section('content')
	<form action="{{url('/product/update')}}" method="POST" role="form">
		{{csrf_field()}}
		<legend>Select the Product</legend>

		<div class="input-field col s12">
			<select name="productId" class="form-control" required="required">
				<option value="" disabled selected>Product Name</option>
				@foreach($products as $product)
					<option value="{{$product['id']}}">{{$product['name']}}</option>
				@endforeach
			</select>

		</div>

		<button class="btn waves-effect waves-light" type="submit" name="action">Update Product
		</button>
	</form>
@endsection