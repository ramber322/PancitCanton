@extends('layouts.AdminProductsLayout')

@section('productcontent')
            @foreach ($products as $product)
                <tr>
                    
                    <td>{{ $product->Product_ID }}</td>
                    <td>{{ $product->Product_Name }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Category }}</td>
                    <td>
                    <a href="{{ url('admin/products/delete/' . $product->Product_ID) }}"><img style = "width: 23px; height: 23px; " src = "https://cdn-icons-png.freepik.com/512/6861/6861362.png?ga=GA1.1.2048724760.1716480993"> </a>
                    </td>
                 
                </tr>
            @endforeach
       
        @endsection

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-order').on('click', function() {
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');
            addToOrder(productId, productName, productPrice);
        });

        function addToOrder(productId, productName, productPrice) {
            $.ajax({
                type: 'POST',
                url: '/addToOrder', // Define your route in Laravel
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    product_name: productName,
                    product_price: productPrice
                },
                success: function(response) {
                    alert('Product added to order successfully!');
                    // You can update UI or do something else on success
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Error adding product to order. Please try again.');
                }
            });
        }
    });
</script>
