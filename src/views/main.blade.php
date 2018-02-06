@extends('trancended-clientproduct::layouts/master')

@section('content')
	<ul class="list-group">
		<li class="list-group-item"><a href="{{url('/products?status=1')}}">Show only available Products</a></li>
		<li class="list-group-item"><a href="{{url('/products?status=0')}}">Show only not available Products</a></li>
		<li class="list-group-item"><a href="{{url('/products?morethan=5')}}">Show Products with amount greater than 5</a></li>
	</ul>
	<ul class="list-group">
		<li class="list-group-item"><a href="{{url('/products')}}">Show all the Products</a></li>
		<li class="list-group-item"><a href="{{url('/product')}}">Show a Specific Product</a></li>
		<li class="list-group-item"><a href="{{url('/product/create')}}">Create a Specific Product</a></li>
		<li class="list-group-item"><a href="{{url('/product/update')}}">Update a Specific Product</a></li>
		<li class="list-group-item"><a href="{{url('/product/remove')}}">Delete a Specific Product</a></li>
	</ul>
@endsection