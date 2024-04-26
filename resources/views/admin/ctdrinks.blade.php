@extends('layouts.AdminDashboardLayout')


@section('content')

@foreach($drinks as $product)
<div class="productdisplay">
        <img  src="{{ asset('assets/images/soda_transparent.png') }}">
        <p>{{ $product->Product_Name }}</p>
        <p>{{ $product->Price }}</p>
    </div>
    @endforeach


@endsection