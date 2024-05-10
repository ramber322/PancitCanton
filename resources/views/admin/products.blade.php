@extends('layouts.AdminProductsLayout')

@section('productcontent')
            @foreach ($products as $product)
                <tr>
                    
                    <td>{{ $product->Product_ID }}</td>
                    <td>{{ $product->Product_Name }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Category }}</td>
                    <td>
                    <a href="{{ url('admin/products/delete/' . $product->Product_ID) }}">Delete</a>
                    </td>
                 
                </tr>
            @endforeach
       
        @endsection
