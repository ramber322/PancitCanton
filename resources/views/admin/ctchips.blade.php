@extends('layouts.AdminDashboardLayout')

@section('content')
@foreach($chips as $product)
<div class="productdisplay" onclick="addToCart('{{ $product->id }}', '{{ $product->Product_Name }}', {{ $product->Price }}, '{{ $product->Product_ID }}')">
    <img class="chipsimg" src="{{ asset('assets/images/chips_transparent.png') }}">
    <p>{{ $product->Product_Name }}</p>
    <p>{{ $product->Price }}</p>
    
</div>
@endforeach

<form id="addToCartForm" action="{{ route('ctchips.addToCart') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" id="productName" name="product_name">
    <input type="hidden" id="productPrice" name="product_price">
    <input type="hidden" id="Product_ID" name="product_id">
</form>

<script>
    function addToCart(id, productName, productPrice, Product_ID) {
        document.getElementById('productName').value = productName;
        document.getElementById('productPrice').value = productPrice;
        document.getElementById('Product_ID').value = Product_ID; // Assign Product_ID to the form field
        document.getElementById('addToCartForm').submit();
    }
</script>
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
