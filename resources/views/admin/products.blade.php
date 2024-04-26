@extends('layouts.AdminProductsLayout')

@section('productcontent')
            @foreach ($products as $product)
                <tr>
                    
                    <td>{{ $product->Product_ID }}</td>
                    <td>{{ $product->Product_Name }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Category }}</td>
                  
                 
                </tr>
            @endforeach
       
        @endsection
