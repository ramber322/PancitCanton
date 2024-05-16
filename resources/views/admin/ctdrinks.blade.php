@extends('layouts.AdminDashboardLayout')

@section('content')
@foreach($drinks as $product)
<div class="productdisplay" onclick="addToCart('{{ $product->id }}', '{{ $product->Product_Name }}', {{ $product->Price }}, '{{ $product->Product_ID }}')">
    <img src="{{ asset('assets/images/soda_transparent.png') }}">
    <p>{{ $product->Product_Name }}</p>
    <p>{{ $product->Price }}</p>
</div>
@endforeach
<form id="addToCartForm" action="{{ route('ctdrinks.addToCart') }}" method="POST" style="display: none;">
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
        @php
            $totalCost = 0; 
        @endphp

        
     @foreach ($orderedproducts as $orderedproduct)
     <tr>
    <td>{{ $orderedproduct->Product_Name }}</td>
    <td>{{ $orderedproduct->Price }}</td>
    <td> <a href="{{ url('admin/ctchips/minus/' . $orderedproduct->id) }}">
        <i class="fa fa-minus" style="font-size:15px;color:red">
    </i>
    </a>  {{ $orderedproduct->Quantity }} <a href="{{ url('admin/ctchips/add/' . $orderedproduct->id) }}"> <i class="fa fa-plus" style="font-size:15px;color:green"></i> </td>
    <td>

    <a href="{{ url('admin/ctchips/delete/' . $orderedproduct->id) }}">
        <i class="fa fa-trash-o" style="font-size:28px;color:red">
    </i>
    </a>
   
</td>
</tr>
                @php
          
            $subtotal = $orderedproduct->Price * $orderedproduct->Quantity;
            $totalCost += $subtotal;
            @endphp

            @endforeach


@endsection


@section('totalcost')
<p style ="text-align:left; margin-left: 0px; ">Total Cost: ${{ $totalCost }}</p>
@endsection