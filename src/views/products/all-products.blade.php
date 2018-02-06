@extends('trancended-clientproduct::layouts.master')

@section('content')
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{$product['id']}}</td>
				<td>{{$product['name']}}</td>
				<td>{{$product['amount']}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection