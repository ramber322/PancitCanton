@extends('layouts.AdminDashboardLayout')

@section('content')

@foreach($products as $product)
<div class="productdisplay">
        <img src="{{ asset('assets/images/burger_transparent.png') }}">
        <p>{{ $product->Product_Name }}</p>
        <p>{{ $product->Price }}</p>
    </div>
    @endforeach

@endsection


@section('orderline')

     @foreach ($orderedproducts as $orderedproduct)
                <tr>
                    
                    <td>{{ $orderedproduct->Product_Name }}</td>
                    <td>{{ $orderedproduct->Price }}</td>
                    <td>{{ $orderedproduct->Quantity }}</td>
                 
                </tr>
            @endforeach


@endsection
