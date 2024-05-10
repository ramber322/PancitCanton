@extends('layouts.AdminDashboardLayout')

@section('content')
@foreach($drinks as $product)
<div class="productdisplay add-to-order" data-product-id="{{ $product->id }}" data-product-name="{{ $product->Product_Name }}" data-product-price="{{ $product->Price }}">
    <img src="{{ asset('assets/images/soda_transparent.png') }}">
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
